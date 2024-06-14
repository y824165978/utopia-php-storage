<?php

namespace Utopia\Tests\Storage\Device;

use Utopia\Storage\Device\MinIO;
use Utopia\Tests\Storage\S3Base;

class MinIOTest extends S3Base
{
    protected function init(): void
    {
        $this->root = '/root';
        $key = $_SERVER['S3_ACCESS_KEY'] ?? '';
        $secret = $_SERVER['S3_SECRET'] ?? '';
        $bucket = 'utopia-storage-test';

        $this->object = new MinIO($this->root, $key, $secret, $bucket, S3::EU_CENTRAL_1, S3::ACL_PRIVATE);
    }

    /**
     * @return string
     */
    protected function getAdapterName(): string
    {
        return 'MinIO Storage';
    }

    protected function getAdapterType(): string
    {
        return $this->object->getType();
    }

    protected function getAdapterDescription(): string
    {
        return 'S3 Bucket Storage drive for MinIO or on premise solution';
    }
}
