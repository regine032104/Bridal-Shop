// Cart quantity +/- and live total update
(function () {
  function qs(sel, root) { return (root || document).querySelector(sel); }
  function qsa(sel, root) { return Array.from((root || document).querySelectorAll(sel)); }

  function formatPrice(num) { return '₱' + (Number(num) || 0).toFixed(2); }

  function recalcTotals() {
    var lineTotals = qsa('.line-total');
    var subtotal = 0;
    lineTotals.forEach(function (el) {
      var val = parseFloat(el.getAttribute('data-line-total')) || 0;
      subtotal += val;
    });
    var subtotalEl = qs('#subtotal-amount');
    var totalEl = qs('#total-amount');
    if (subtotalEl) subtotalEl.textContent = formatPrice(subtotal);
    if (totalEl) totalEl.textContent = formatPrice(subtotal);
  }

  function debounce(func, wait) {
    var timeout;
    return function () {
      var context = this, args = arguments;
      clearTimeout(timeout);
      timeout = setTimeout(function () { func.apply(context, args); }, wait);
    };
  }

  function sendUpdateToServer() {
    var inputs = qsa('.qty-input');
    var fd = new FormData();
    fd.append('ajax_update', '1');
    inputs.forEach(function (input) { fd.append(input.name, input.value); });

    fetch(window.location.pathname, {
      method: 'POST',
      credentials: 'same-origin',
      body: fd
    }).then(function (res) {
      if (!res.ok) throw new Error('Network response was not ok');
      return res.json();
    }).then(function (data) {
      if (data && data.subtotal !== undefined) {
        var subtotalEl = qs('#subtotal-amount');
        var totalEl = qs('#total-amount');
        var numeric = parseFloat(data.subtotal) || 0;
        if (subtotalEl) subtotalEl.textContent = '₱' + numeric.toFixed(2);
        if (totalEl) totalEl.textContent = '₱' + numeric.toFixed(2);
      }
    }).catch(function (err) { console.error('Cart update failed:', err); });
  }

  var debouncedServerUpdate = debounce(sendUpdateToServer, 600);

  function updateLineTotalFromInput(input) {
    var qty = parseInt(input.value) || 0;
    var base = parseFloat(input.getAttribute('data-base-price')) || 0;
    var row = input.closest('tr');
    var lineCell = row && row.querySelector('.line-total');
    var newLine = base * qty;
    if (lineCell) {
      lineCell.setAttribute('data-line-total', newLine);
      lineCell.textContent = formatPrice(newLine);
    }
  }

  document.addEventListener('click', function (e) {
    var dec = e.target.closest('.qty-btn.decrease');
    var inc = e.target.closest('.qty-btn.increase');
    if (dec || inc) {
      e.preventDefault();
      var btn = dec || inc;
      var row = btn.closest('tr');
      var input = row && row.querySelector('.qty-input');
      if (!input) return;
      var current = parseInt(input.value) || 0;
      if (btn.classList.contains('increase')) {
        input.value = Math.min(99, current + 1);
      } else {
        input.value = Math.max(0, current - 1);
      }
      updateLineTotalFromInput(input);
      if (parseInt(input.value) === 0) {
        row.parentNode && row.parentNode.removeChild(row);
      }
      recalcTotals();
      debouncedServerUpdate();
    }
  });

  document.addEventListener('input', function (e) {
    if (e.target && e.target.classList && e.target.classList.contains('qty-input')) {
      var input = e.target;
      var val = parseInt(input.value) || 0;
      if (val < 0) input.value = 0;
      if (val > 99) input.value = 99;
      updateLineTotalFromInput(input);
      if (parseInt(input.value) === 0) {
        var row = input.closest('tr');
        row && row.parentNode && row.parentNode.removeChild(row);
      }
      recalcTotals();
      debouncedServerUpdate();
    }
  });

  window.addEventListener('load', function () {
    qsa('.qty-input').forEach(function (input) { updateLineTotalFromInput(input); });
    recalcTotals();
  });
})();
