<?php

declare(strict_types=1);

use Maartenpaauw\Mcp\JsonRpc\Request;
use Maartenpaauw\Mcp\JsonRpc\RequestIdentifier;
use Maartenpaauw\Mcp\JsonRpc\Version;
use Maartenpaauw\Mcp\Message\Request\Client\CreateMessageRequest;
use Maartenpaauw\Mcp\Message\Request\Parameter\AdditionalProperty;
use Maartenpaauw\Mcp\Message\Request\Parameter\Annotations;
use Maartenpaauw\Mcp\Message\Request\Parameter\Audience;
use Maartenpaauw\Mcp\Message\Request\Parameter\AudioContent;
use Maartenpaauw\Mcp\Message\Request\Parameter\Base64;
use Maartenpaauw\Mcp\Message\Request\Parameter\ImageContent;
use Maartenpaauw\Mcp\Message\Request\Parameter\IncludeContext;
use Maartenpaauw\Mcp\Message\Request\Parameter\LastModified;
use Maartenpaauw\Mcp\Message\Request\Parameter\MaxTokens;
use Maartenpaauw\Mcp\Message\Request\Parameter\Meta\Entry;
use Maartenpaauw\Mcp\Message\Request\Parameter\Meta\Key;
use Maartenpaauw\Mcp\Message\Request\Parameter\Meta\Meta;
use Maartenpaauw\Mcp\Message\Request\Parameter\Meta\MetaWithProgressToken;
use Maartenpaauw\Mcp\Message\Request\Parameter\Metadata;
use Maartenpaauw\Mcp\Message\Request\Parameter\MimeType;
use Maartenpaauw\Mcp\Message\Request\Parameter\ModelHint;
use Maartenpaauw\Mcp\Message\Request\Parameter\ModelHints;
use Maartenpaauw\Mcp\Message\Request\Parameter\ModelPreferences;
use Maartenpaauw\Mcp\Message\Request\Parameter\Name;
use Maartenpaauw\Mcp\Message\Request\Parameter\Priority;
use Maartenpaauw\Mcp\Message\Request\Parameter\ProgressToken;
use Maartenpaauw\Mcp\Message\Request\Parameter\Role;
use Maartenpaauw\Mcp\Message\Request\Parameter\SamplingMessage;
use Maartenpaauw\Mcp\Message\Request\Parameter\SamplingMessages;
use Maartenpaauw\Mcp\Message\Request\Parameter\StopSequence;
use Maartenpaauw\Mcp\Message\Request\Parameter\StopSequences;
use Maartenpaauw\Mcp\Message\Request\Parameter\SystemPrompt;
use Maartenpaauw\Mcp\Message\Request\Parameter\Temperature;
use Maartenpaauw\Mcp\Message\Request\Parameter\Text;
use Maartenpaauw\Mcp\Message\Request\Parameter\TextContent;
use Maartenpaauw\Mcp\Message\Request\Parameter\Unknown;

return new Request(
    version: Version::v2_0,
    identifier: new RequestIdentifier(value: 1),
    request: new CreateMessageRequest(
        samplingMessages: new SamplingMessages(
            new SamplingMessage(
                role: Role::User,
                content: new TextContent(
                    text: new Text(value: 'Please analyze this image and provide insights about the data trends shown.'),
                    annotations: new Annotations(
                        audience: new Audience(Role::Assistant),
                        priority: new Priority(value: 0.9),
                        lastModified: new LastModified(timestamp: new DateTimeImmutable(datetime: '2025-07-04T10:29:45Z')),
                    ),
                    meta: new Maartenpaauw\Mcp\Message\Request\Parameter\Meta\Meta(
                        new Entry(
                            key: new Key(value: 'messageId'),
                            value: new Unknown(value: 'msg-001'),
                        ),
                        new Entry(
                            key: new Key(value: 'source'),
                            value: new Unknown(value: 'user-input'),
                        ),
                    ),
                ),
            ),
            new SamplingMessage(
                role: Role::User,
                content: new ImageContent(
                    data: new Base64(value: 'ZXhhbXBsZV9pbWFnZV9iYXNlNjQ='),
                    mimeType: new MimeType(value: 'image/png'),
                    annotations: new Annotations(
                        audience: new Audience(Role::Assistant),
                        priority: new Priority(value: 1.0),
                        lastModified: new LastModified(timestamp: new DateTimeImmutable(datetime: '2025-07-04T10:29:50Z')),
                    ),
                    meta: new Maartenpaauw\Mcp\Message\Request\Parameter\Meta\Meta(
                        new Entry(
                            key: new Key(value: 'filename'),
                            value: new Unknown(value: 'chart.png'),
                        ),
                        new Entry(
                            key: new Key(value: 'size'),
                            value: new Unknown(value: 1_024),
                        ),
                        new Entry(
                            key: new Key(value: 'uploadTime'),
                            value: new Unknown(value: '2025-07-04T10:29:50+00:00'),
                        ),
                    ),
                ),
            ),
            new SamplingMessage(
                role: Role::User,
                content: new AudioContent(
                    data: new Base64(value: 'ZXhhbXBsZV9hdWRpb19iYXNlNjQ='),
                    mimeType: new MimeType(value: 'audio/wav'),
                    annotations: new Annotations(
                        audience: new Audience(Role::Assistant),
                        priority: new Priority(value: 0.7),
                        lastModified: new LastModified(timestamp: new DateTimeImmutable(datetime: '2025-07-04T10:30:00Z')),
                    ),
                    meta: new Maartenpaauw\Mcp\Message\Request\Parameter\Meta\Meta(
                        new Entry(
                            key: new Key(value: 'channels'),
                            value: new Unknown(value: 2),
                        ),
                        new Entry(
                            key: new Key(value: 'duration'),
                            value: new Unknown(value: 5.2),
                        ),
                        new Entry(
                            key: new Key(value: 'sampleRate'),
                            value: new Unknown(value: 44_100),
                        ),
                    ),
                ),
            ),
            new SamplingMessage(
                role: Role::Assistant,
                content: new TextContent(
                    text: new Text(value: 'I can see the chart shows an upward trend in sales data over the past quarter. The audio confirms your question about seasonal patterns.'),
                    annotations: new Annotations(
                        audience: new Audience(Role::User),
                        priority: new Priority(value: 0.8),
                        lastModified: new LastModified(timestamp: new DateTimeImmutable(datetime: '2025-07-04T10:29:55Z')),
                    ),
                    meta: new Maartenpaauw\Mcp\Message\Request\Parameter\Meta\Meta(
                        new Entry(
                            key: new Key(value: 'confidence'),
                            value: new Unknown(value: 0.95),
                        ),
                        new Entry(
                            key: new Key(value: 'generatedBy'),
                            value: new Unknown(value: 'claude-3-5-sonnet'),
                        ),
                    ),
                ),
            )
        ),
        modelPreferences: new ModelPreferences(
            modelHints: new ModelHints(
                new ModelHint(
                    name: new Name(value: 'claude-3-5-sonnet'),
                ),
                new ModelHint(
                    name: new Name(value: 'gpt-4'),
                ),
            ),
            costPriority: new Priority(value: 0.3),
            speedPriority: new Priority(value: 0.7),
            intelligencePriority: new Priority(value: 0.9),
        ),
        systemPrompt: new SystemPrompt(value: 'You are a data analysis expert with deep knowledge of statistical trends, visualization interpretation, and business intelligence. When analyzing charts or data, provide detailed insights about patterns, anomalies, and actionable recommendations. Always consider seasonal factors, market context, and statistical significance in your analysis.'),
        includeContext: IncludeContext::AllServers,
        temperature: new Temperature(value: 0.7),
        maxTokens: new MaxTokens(value: 2048),
        stopSequences: new StopSequences(
            new StopSequence(value: 'Human:'),
            new StopSequence(value: 'User:'),
            new StopSequence(value: 'END_ANALYSIS'),
        ),
        metadata: new Metadata(
            new AdditionalProperty(
                name: new Name(value: 'provider'),
                value: new Unknown(value: 'anthropic'),
            ),
            new AdditionalProperty(
                name: new Name(value: 'model_version'),
                value: new Unknown(value: 20241022),
            ),
            new AdditionalProperty(
                name: new Name(value: 'request_source'),
                value: new Unknown(value: 'dashboard'),
            ),
            new AdditionalProperty(
                name: new Name(value: 'user_id'),
                value: new Unknown(value: 'user-12345'),
            ),
            new AdditionalProperty(
                name: new Name(value: 'session_id'),
                value: new Unknown(value: 'sess-67890'),
            ),
            new AdditionalProperty(
                name: new Name(value: 'billing_tier'),
                value: new Unknown(value: 'premium'),
            ),
            new AdditionalProperty(
                name: new Name(value: 'custom_parameters'),
                value: new Unknown(value: [
                    'analysis_depth' => 'comprehensive',
                    'output_format' => 'structured',
                    'include_citations' => true,
                ]),
            )
        ),
        meta: new MetaWithProgressToken(
            progressToken: new ProgressToken(value: 'progress-token-abc123'),
            entries: new Meta(
                new Entry(
                    key: new Key(value: 'clientVersion'),
                    value: new Unknown(value: '1.0.0'),
                ),
                new Entry(
                    key: new Key(value: 'requestId'),
                    value: new Unknown(value: 'internal-req-789'),
                ),
                new Entry(
                    key: new Key(value: 'timestamp'),
                    value: new Unknown(value: '2025-07-04T10:30:00+00:00'),
                ),
            )
        ),
    ),
);
