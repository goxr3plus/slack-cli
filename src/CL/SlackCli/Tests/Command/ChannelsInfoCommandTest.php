<?php

namespace CL\SlackCli\Tests\Command;

use CL\SlackCli\Command\ChannelsInfoCommand;

class ChannelsInfoCommandTest extends AbstractApiCommandTest
{
    public function testExecute()
    {
        $args = [
            'channel-id' => 'C1234567',
        ];

        $this->assertExecutionSucceedsWith($args, [
            'Successfully retrieved information about the channel',
            'C1234567',
            'acme_channel',
            '1970-05-23T21:21:18+0000',
            'U1234567',
            '{"ts":"12345678.12345678","type":"message","channel":{"id":"C1234567","name":"#foo"},"user":"U1234567","username":"Acme","text":"Hello world!","attachments":[]}',
            '12345678.12345678',
            '["U1234567"]',
            '{"value":"Discuss secret plans that no-one else should know","type":"text","creator":"U024BE7LH","last_set":"2013-02-13T19:13:24+0000"}',
            '{"value":"Discuss secret plans that no-one else should know","type":"text","creator":"U024BE7LH","last_set":"2013-02-13T19:13:24+0000"}',
        ]);

        $this->assertExecutionFailsWith($args, 'Failed to retrieve information about the channel');
    }

    protected function createCommand()
    {
        return new ChannelsInfoCommand();
    }

    /**
     * {@inheritdoc}
     */
    protected function getExpectedName()
    {
        return 'channels:info';
    }

    /**
     * {@inheritdoc}
     */
    protected function getExpectedArguments()
    {
        return [
            'channel-id',
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getExpectedOptions()
    {
        return [];
    }
}
