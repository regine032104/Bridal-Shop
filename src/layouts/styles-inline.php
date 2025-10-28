<?php
/**
 * Inline styles helper to embed CSS file contents into <style> tags.
 * This preserves UI/UX becouse i remove the external .css references.
 */
if (!function_exists('renderInlineStylesFromFiles')) {
    function renderInlineStylesFromFiles(array $relativePaths): void
    {
        foreach ($relativePaths as $path) {
            // Try to inline from the provided path first
            if (is_string($path) && file_exists($path)) {
                $css = file_get_contents($path);
                if ($css !== false) {
                    echo "<style>\n" . $css . "\n</style>\n";
                    continue;
                }
            }

            // Fallbacks for when the .css file has been removed from disk
            if (is_string($path)) {
                $base = basename($path);
                if ($base === 'output.css') {
                    // Load embedded CSS
                    $embeddedFile = __DIR__ . '/output.php';
                    if (file_exists($embeddedFile)) {
                        include_once $embeddedFile;
                        if (function_exists('getEmbeddedOutputCss')) {
                            $css = getEmbeddedOutputCss();
                            echo "<style>\n" . $css . "\n</style>\n";
                            continue;
                        }
                    }
                }
            }
        }
    }
}
?>