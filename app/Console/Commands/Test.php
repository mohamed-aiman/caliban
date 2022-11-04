<?php

namespace App\Console\Commands;

use DOMDocument;
use Illuminate\Console\Command;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 't';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Hello World');

        $document = new DOMDocument();
        $document->preserveWhiteSpace = false; 

        $filePath = storage_path('app/data/c.html');
        $document->loadHTMLFile($filePath);
        
        $ul = $document->getElementById("menu-v1");
        
        // dd($ul);
        // dd($document);
        $data = [];
        
        // dd($ul->childNodes);
        // dd(get_class_methods($ul));
        foreach ($ul->childNodes as $node) {

            $texts = $this->getTexts($node);
            if (count($texts) > 0) {
                $data[] = $texts;
            }
            // if ($node->nodeName == 'li') {
            //     dd($node->childNodes);
            //     $data[] = str_replace("\n", "", $node->textContent);
            // } else {
            //     dd($node);
            // }
            // If the node is an element node, the nodeType property will return 1.
            // If the node is an attribute node, the nodeType property will return 2.
            // If the node is a text node, the nodeType property will return 3.
            // If the node is a comment node, the nodeType property will return 8.

            // dump($node->nodeType);
            // $text = str_replace("\n", "", $node->textContent);
            // dump(trim($text) . " - ". PHP_EOL);
            // dump(trim($text) . " - " . $node->nodeName . " - " . $node->nodeType . " - " . $node->nodeValue . PHP_EOL);
            // dump(trim($node->nodeValue));
            // dd($node->nodeValue);
            # code...
        }

        // $allTableRows = $tableElement->getElementsByTagName("tr");
        // foreach($allTableRows as $tableRow) {
        //     $allTableCellsInThisRow = $tableRow->getElementsByTagName("td");
        //     $firstCell = $allTableCellsInThisRow->item(0);
        //     $secondCell = $allTableCellsInThisRow->item(1);
        //     // and so on ..
        //     // do your processing of table rows and data here
        // }

        // dd($data);

    }

    protected function getTexts($node)
    {
        $texts = [];
        $children = $node->childNodes;
        foreach ($children as $child) {
            if ($child->nodeType == XML_TEXT_NODE) {
                $text = trim($child->textContent);
                //remove multiple spaces
                $text = preg_replace('/\s+/', ' ', $text);
                $text = str_replace("\n", "", $text);
                if ($text) {
                    $texts[] = $text;
                }
                dump('XML_TEXT_NODE: ' . $child->nodeName . " - " . $child->nodeValue);
            } else {
                // dump($child->nodeName . " - " . $child->nodeValue);
                $texts = array_merge($texts, $this->getTexts($child));
                dump('NOT XML_TEXT_NODE: ' . $child->nodeName . " - " . $child->nodeValue);
            }
        }
        return $texts;
    }


    protected function getTextFromNode($node)
    {
        $text = "";
        foreach ($node->childNodes as $child) {
            if ($child->nodeType == XML_TEXT_NODE) {
                $text .= $child->nodeValue;
            } else {
                $text .= $this->getTextFromNode($child);
            }
        }
        return $text;
    }
}
