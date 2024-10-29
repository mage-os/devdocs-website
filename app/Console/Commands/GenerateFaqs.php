<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Documentation;
use Illuminate\Support\Facades\Storage;

class GenerateFaqs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'faq:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate FAQs from documentation content';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $documentation = new Documentation();
        $content = $documentation->getAllContent();

        $faqs = $this->generateFaqs($content);

        Storage::put('faqs.json', json_encode($faqs));

        $this->info('FAQs generated successfully.');

        return 0;
    }

    /**
     * Generate FAQs from the given content using GPT.
     *
     * @param string $content
     * @return array
     */
    protected function generateFaqs($content)
    {
        // Use GPT to generate FAQs from the content
        // This is a placeholder for the actual implementation
        return [
            [
                'question' => 'What is Mage-OS?',
                'answer' => 'Mage-OS is a community-driven eCommerce platform.'
            ],
            [
                'question' => 'How do I install Mage-OS?',
                'answer' => 'You can install Mage-OS by following the installation guide in the documentation.'
            ]
        ];
    }
}
