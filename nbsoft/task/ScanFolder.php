<?php

class ScanFolder
{
    function scanDir($fileList)
    {
        foreach ($fileList as $filename) {
            echo $filename, '<br>';

            if (is_dir($filename)) {
                $folders = scandir($filename, 1);
                foreach ($folders as $folder) {
                    if ($folder === "..") {
                        unset($folder);
                        break;
                    }
                    echo $filename . '/' . $folder, '<br>';
                    if (is_dir($filename . '/' . $folder)) {
                        $newListFile = glob($filename . "/" . $folder . "/*");
                        foreach ($newListFile as $newFileName) {
                            echo $newFileName, '<br>';
                            $this->rescanDir($filename, $newFileName);
                        }
                    }
                }
            }
        }
    }

    function rescanDir($filename, $newFileName)
    {
        if (is_dir($newFileName)) {
            $folders = scandir($newFileName, 1);
            foreach ($folders as $folder) {
                if ($folder === "..") {
                    unset($folder);
                    break;
                }
                echo $newFileName . '/' . $folder, '<br>';
                if (is_dir($newFileName . '/' . $folder)) {
                    $newListFile = glob($newFileName . "/" . $folder . "/*");
                    foreach ($newListFile as $newFileName) {
                        echo $newFileName, '<br>';
                        $this->rescanDir($filename, $newFileName);
                    }
                }
            }
        }
    }
}

$fileList = glob("../folder/*");
$obj = new ScanFolder();
$obj->scanDir($fileList);
