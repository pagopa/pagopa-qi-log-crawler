<?php

namespace pagopa\methods\resp;

use pagopa\crawler\methods\resp\activatePaymentNotice;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('methods\resp\activatePaymentNotice::class')]
class activatePaymentNoticeTest extends TestCase
{

    protected activatePaymentNotice $one_transfer;

    protected activatePaymentNotice $two_transfer;

    protected activatePaymentNotice $fault_response;

    protected activatePaymentNotice $metadata_response;


    protected function setUp(): void
    {
        $this->one_transfer = new activatePaymentNotice(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQkJPHRvdGFsQW1vdW50PjE4My44NTwvdG90YWxBbW91bnQ+CgkJCTxwYXltZW50RGVzY3JpcHRpb24+RU5FTCBFTkVSR0lBL05VTURPQz00MzU1NDI1ODYzL0RBVEFET0M9MDguMDguMjAyMy9BVlZJU089MzA0MTAwNDM1NTQyNTg2Mzg5L0lNUE9SVE89MTgzLDg1LzwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjA2NjU1OTcxMDA3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT5FbmVsIEVuZXJnaWEgUy5wLkEuPC9jb21wYW55TmFtZT4KCQkJPHBheW1lbnRUb2tlbj4wYThlZjRmMDE5NGY0ODg2OTQyY2JjOGRhOGZkYmUwNDwvcGF5bWVudFRva2VuPgoJCQk8dHJhbnNmZXJMaXN0PgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjE8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjE4My44NTwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT4wNjY1NTk3MTAwNzwvZmlzY2FsQ29kZVBBPgoJCQkJCTxJQkFOPklUMThVMDMwNjkwOTQwMDEwMDAwMDAwOTEzODwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPi9SRkIvMDQxMDA0MzU1NDI1ODYzODkvVFhUL0VORUwgRU5FUkdJQS9OVU1ET0M9NDM1NTQyNTg2My9EQVRBRE9DPTA4LjA4LjIwMjMvQVZWSVNPPTMwNDEwMDQzNTU0MjU4NjM4OS9JTVBPUlRPPTE4Myw4NS88L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8Y3JlZGl0b3JSZWZlcmVuY2VJZD4wNDEwMDQzNTU0MjU4NjM4OTwvY3JlZGl0b3JSZWZlcmVuY2VJZD4KCQk8L25mcDphY3RpdmF0ZVBheW1lbnROb3RpY2VSZXM+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=='));
        $this->two_transfer = new activatePaymentNotice(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQkJPHRvdGFsQW1vdW50PjE4My44NTwvdG90YWxBbW91bnQ+CgkJCTxwYXltZW50RGVzY3JpcHRpb24+RU5FTCBFTkVSR0lBL05VTURPQz00MzU1NDI1ODYzL0RBVEFET0M9MDguMDguMjAyMy9BVlZJU089MzA0MTAwNDM1NTQyNTg2Mzg5L0lNUE9SVE89MTgzLDg1LzwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjA2NjU1OTcxMDA3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT5FbmVsIEVuZXJnaWEgUy5wLkEuPC9jb21wYW55TmFtZT4KCQkJPHBheW1lbnRUb2tlbj4wYThlZjRmMDE5NGY0ODg2OTQyY2JjOGRhOGZkYmUwNDwvcGF5bWVudFRva2VuPgoJCQk8dHJhbnNmZXJMaXN0PgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjE8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjE4MC44NTwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT4wNjY1NTk3MTAwNzwvZmlzY2FsQ29kZVBBPgoJCQkJCTxJQkFOPklUMThVMDMwNjkwOTQwMDEwMDAwMDAwOTEzODwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPi9SRkIvMDQxMDA0MzU1NDI1ODYzODkvVFhUL0VORUwgRU5FUkdJQS9OVU1ET0M9NDM1NTQyNTg2My9EQVRBRE9DPTA4LjA4LjIwMjMvQVZWSVNPPTMwNDEwMDQzNTU0MjU4NjM4OS9JTVBPUlRPPTE4Myw4NS88L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCTwvdHJhbnNmZXI+CgkJCQk8dHJhbnNmZXI+CgkJCQkJPGlkVHJhbnNmZXI+MjwvaWRUcmFuc2Zlcj4KCQkJCQk8dHJhbnNmZXJBbW91bnQ+My4wMDwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT4wNjY1NTk3MTAwODwvZmlzY2FsQ29kZVBBPgoJCQkJCTxJQkFOPklUMThVMDMwNjkwOTQwMDEwMDAwMDAwOTEzOTwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPi9SRkIvMDQxMDA0MzU1NDI1ODYzODkvVFhUL0VORUwgRU5FUkdJQS9OVU1ET0M9NDM1NTQyNTg2My9EQVRBRE9DPTA4LjA4LjIwMjMvQVZWSVNPPTMwNDEwMDQzNTU0MjU4NjM4OS9JTVBPUlRPPTE4Myw4NS88L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8Y3JlZGl0b3JSZWZlcmVuY2VJZD4wNDEwMDQzNTU0MjU4NjM4OTwvY3JlZGl0b3JSZWZlcmVuY2VJZD4KCQk8L25mcDphY3RpdmF0ZVBheW1lbnROb3RpY2VSZXM+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=='));
        $this->fault_response = new activatePaymentNotice(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJCQk8b3V0Y29tZT5LTzwvb3V0Y29tZT4KCQkJPGZhdWx0PgoJCQkJPGZhdWx0Q29kZT5QUFRfRVJST1JFX0VNRVNTT19EQV9QQUE8L2ZhdWx0Q29kZT4KCQkJCTxmYXVsdFN0cmluZz5FcnJvcmUgcmVzdGl0dWl0byBkYWxsYSBQQUEuPC9mYXVsdFN0cmluZz4KCQkJCTxpZD44MDAwMDA1MDkyNDwvaWQ+CgkJCQk8ZGVzY3JpcHRpb24+RmF1bHRDb2RlIFBBOiBQQUFfUEFHQU1FTlRPX0RVUExJQ0FUTwpGYXVsdFN0cmluZyBQQTogUGFnYW1lbnRvIGluIGF0dGVzYSByaXN1bHRhIGNvbmNsdXNvIGFsbCdFbnRlCUNyZWRpdG9yZQpEZXNjcmlwdGlvbiBQQTogUGFnYW1lbnRvIEF0dGVzbyBpbiBzdGF0byBSSUNFVlVUQV9SVF9QT1NJVElWQTwvZGVzY3JpcHRpb24+CgkJCTwvZmF1bHQ+CgkJPC9uZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4='));
        $this->metadata_response = new activatePaymentNotice(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQkJPHRvdGFsQW1vdW50PjE4My44NTwvdG90YWxBbW91bnQ+CgkJCTxwYXltZW50RGVzY3JpcHRpb24+RU5FTCBFTkVSR0lBL05VTURPQz00MzU1NDI1ODYzL0RBVEFET0M9MDguMDguMjAyMy9BVlZJU089MzA0MTAwNDM1NTQyNTg2Mzg5L0lNUE9SVE89MTgzLDg1LzwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjA2NjU1OTcxMDA3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT5FbmVsIEVuZXJnaWEgUy5wLkEuPC9jb21wYW55TmFtZT4KCQkJPHBheW1lbnRUb2tlbj4wYThlZjRmMDE5NGY0ODg2OTQyY2JjOGRhOGZkYmUwNDwvcGF5bWVudFRva2VuPgoJCQk8dHJhbnNmZXJMaXN0PgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjE8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjE4My44NTwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT4wNjY1NTk3MTAwNzwvZmlzY2FsQ29kZVBBPgoJCQkJCTxJQkFOPklUMThVMDMwNjkwOTQwMDEwMDAwMDAwOTEzODwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPi9SRkIvMDQxMDA0MzU1NDI1ODYzODkvVFhUL0VORUwgRU5FUkdJQS9OVU1ET0M9NDM1NTQyNTg2My9EQVRBRE9DPTA4LjA4LjIwMjMvQVZWSVNPPTMwNDEwMDQzNTU0MjU4NjM4OS9JTVBPUlRPPTE4Myw4NS88L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCQk8bWV0YWRhdGE+CgkJCQkJCTxtYXBFbnRyeT4KCQkJCQkJCTxrZXk+Y2hpYXZlX3RyYW5zZmVyXzFfMTwva2V5PgoJCQkJCQkJPHZhbHVlPnZhbHVlX3RyYW5zZmVyXzFfMTwvdmFsdWU+CgkJCQkJCTwvbWFwRW50cnk+CgkJCQkJCTxtYXBFbnRyeT4KCQkJCQkJCTxrZXk+Y2hpYXZlX3RyYW5zZmVyXzFfMjwva2V5PgoJCQkJCQkJPHZhbHVlPnZhbHVlX3RyYW5zZmVyXzFfMjwvdmFsdWU+CgkJCQkJCTwvbWFwRW50cnk+CgkJCQkJPC9tZXRhZGF0YT4KCQkJCTwvdHJhbnNmZXI+CgkJCQk8dHJhbnNmZXI+CgkJCQkJPGlkVHJhbnNmZXI+MjwvaWRUcmFuc2Zlcj4KCQkJCQk8dHJhbnNmZXJBbW91bnQ+MTgzLjg1PC90cmFuc2ZlckFtb3VudD4KCQkJCQk8ZmlzY2FsQ29kZVBBPjA2NjU1OTcxMDA3PC9maXNjYWxDb2RlUEE+CgkJCQkJPElCQU4+SVQxOFUwMzA2OTA5NDAwMTAwMDAwMDA5MTM4PC9JQkFOPgoJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+L1JGQi8wNDEwMDQzNTU0MjU4NjM4OS9UWFQvRU5FTCBFTkVSR0lBL05VTURPQz00MzU1NDI1ODYzL0RBVEFET0M9MDguMDguMjAyMy9BVlZJU089MzA0MTAwNDM1NTQyNTg2Mzg5L0lNUE9SVE89MTgzLDg1LzwvcmVtaXR0YW5jZUluZm9ybWF0aW9uPgoJCQkJCTxtZXRhZGF0YT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5jaGlhdmVfdHJhbnNmZXJfMl8xPC9rZXk+CgkJCQkJCQk8dmFsdWU+dmFsdWVfdHJhbnNmZXJfMl8xPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5jaGlhdmVfdHJhbnNmZXJfMl8yPC9rZXk+CgkJCQkJCQk8dmFsdWU+dmFsdWVfdHJhbnNmZXJfMl8yPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5jaGlhdmVfdHJhbnNmZXJfMl8zPC9rZXk+CgkJCQkJCQk8dmFsdWU+dmFsdWVfdHJhbnNmZXJfMl8zPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQk8L21ldGFkYXRhPgoJCQkJPC90cmFuc2Zlcj4KCQkJCTx0cmFuc2Zlcj4KCQkJCQk8aWRUcmFuc2Zlcj4zPC9pZFRyYW5zZmVyPgoJCQkJCTx0cmFuc2ZlckFtb3VudD4xODMuODU8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+MDY2NTU5NzEwMDc8L2Zpc2NhbENvZGVQQT4KCQkJCQk8SUJBTj5JVDE4VTAzMDY5MDk0MDAxMDAwMDAwMDkxMzg8L0lCQU4+CgkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj4vUkZCLzA0MTAwNDM1NTQyNTg2Mzg5L1RYVC9FTkVMIEVORVJHSUEvTlVNRE9DPTQzNTU0MjU4NjMvREFUQURPQz0wOC4wOC4yMDIzL0FWVklTTz0zMDQxMDA0MzU1NDI1ODYzODkvSU1QT1JUTz0xODMsODUvPC9yZW1pdHRhbmNlSW5mb3JtYXRpb24+CgkJCQk8L3RyYW5zZmVyPgoJCQk8L3RyYW5zZmVyTGlzdD4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDQxMDA0MzU1NDI1ODYzODk8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJPC9uZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4='));
    }


    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->one_transfer->getAllNoticesNumbers());
        $this->assertNull($this->two_transfer->getAllNoticesNumbers());
        $this->assertNull($this->fault_response->getAllNoticesNumbers());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['06655971007'], $this->one_transfer->getPaEmittenti());
        $this->assertEquals(['06655971007'], $this->two_transfer->getPaEmittenti());
        $this->assertNull($this->fault_response->getPaEmittenti());

    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertEquals(['04100435542586389'], $this->one_transfer->getIuvs());
        $this->assertEquals(['04100435542586389'], $this->two_transfer->getIuvs());
        $this->assertNull($this->fault_response->getIuvs());

    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertEquals(['0a8ef4f0194f4886942cbc8da8fdbe04'], $this->one_transfer->getCcps());
        $this->assertEquals(['0a8ef4f0194f4886942cbc8da8fdbe04'], $this->two_transfer->getCcps());
        $this->assertNull($this->fault_response->getCcps());
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertEquals(['0a8ef4f0194f4886942cbc8da8fdbe04'], $this->one_transfer->getAllTokens());
        $this->assertEquals(['0a8ef4f0194f4886942cbc8da8fdbe04'], $this->two_transfer->getAllTokens());
        $this->assertNull($this->fault_response->getAllTokens());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->one_transfer->getNoticeNumber(0));
        $this->assertNull($this->two_transfer->getNoticeNumber(0));
        $this->assertNull($this->fault_response->getNoticeNumber(0));

    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('06655971007', $this->one_transfer->getPaEmittente(0));
        $this->assertEquals('06655971007', $this->two_transfer->getPaEmittente(0));
        $this->assertNull($this->fault_response->getPaEmittente(0));

        $this->assertNull($this->one_transfer->getPaEmittente(1));
        $this->assertNull($this->two_transfer->getPaEmittente(1));
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertEquals('04100435542586389', $this->one_transfer->getIuv(0));
        $this->assertEquals('04100435542586389', $this->two_transfer->getIuv(0));
        $this->assertNull($this->fault_response->getIuv(0));

        $this->assertNull($this->one_transfer->getIuv(1));
        $this->assertNull($this->two_transfer->getIuv(1));

    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertEquals('0a8ef4f0194f4886942cbc8da8fdbe04', $this->one_transfer->getCcp(0));
        $this->assertEquals('0a8ef4f0194f4886942cbc8da8fdbe04', $this->two_transfer->getCcp(0));
        $this->assertNull($this->fault_response->getCcp(0));

        $this->assertNull($this->one_transfer->getCcp(1));
        $this->assertNull($this->two_transfer->getCcp(1));

    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertEquals('0a8ef4f0194f4886942cbc8da8fdbe04', $this->one_transfer->getToken(0));
        $this->assertEquals('0a8ef4f0194f4886942cbc8da8fdbe04', $this->two_transfer->getToken(0));
        $this->assertNull($this->fault_response->getToken(0));

        $this->assertNull($this->one_transfer->getToken(1));
        $this->assertNull($this->two_transfer->getToken(1));

    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertNull($this->one_transfer->getCanale());
        $this->assertNull($this->two_transfer->getCanale());
        $this->assertNull($this->fault_response->getCanale());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertNull($this->one_transfer->getBrokerPsp());
        $this->assertNull($this->two_transfer->getBrokerPsp());
        $this->assertNull($this->fault_response->getBrokerPsp());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertNull($this->one_transfer->getPsp());
        $this->assertNull($this->two_transfer->getPsp());
        $this->assertNull($this->fault_response->getPsp());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->one_transfer->getStazione());
        $this->assertNull($this->two_transfer->getStazione());
        $this->assertNull($this->fault_response->getStazione());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->one_transfer->getBrokerPa());
        $this->assertNull($this->two_transfer->getBrokerPa());
        $this->assertNull($this->fault_response->getBrokerPa());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertEquals('183.85', $this->one_transfer->getImportoTotale());
        $this->assertEquals('183.85', $this->two_transfer->getImportoTotale());
        $this->assertNull($this->fault_response->getImportoTotale());

    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertEquals('183.85', $this->one_transfer->getImporto(0));
        $this->assertEquals('183.85', $this->two_transfer->getImporto(0));
        $this->assertNull($this->fault_response->getImporto());

        $this->assertNull($this->one_transfer->getImporto(1));
        $this->assertNull($this->two_transfer->getImporto(1));
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertEquals('06655971007', $this->one_transfer->getTransferPa(0, 0));
        $this->assertEquals('06655971007', $this->two_transfer->getTransferPa(0, 0));
        $this->assertEquals('06655971008', $this->two_transfer->getTransferPa(1, 0));
        $this->assertNull($this->fault_response->getTransferPa(0, 0));

        $this->assertNull($this->one_transfer->getTransferPa(2, 0));
        $this->assertEquals('06655971007', $this->one_transfer->getTransferPa(0, 1));
        $this->assertEquals('06655971007', $this->one_transfer->getTransferPa(0, 2));

        $this->assertNull($this->two_transfer->getTransferPa(3, 0));
        $this->assertEquals('06655971007', $this->two_transfer->getTransferPa(0, 1));
        $this->assertEquals('06655971007', $this->two_transfer->getTransferPa(0, 2));
        $this->assertEquals('06655971008', $this->two_transfer->getTransferPa(1, 1));
        $this->assertEquals('06655971008', $this->two_transfer->getTransferPa(1, 2));

    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertEquals('183.85', $this->one_transfer->getTransferAmount(0, 0));
        $this->assertEquals('180.85', $this->two_transfer->getTransferAmount(0, 0));
        $this->assertEquals('3.00', $this->two_transfer->getTransferAmount(1, 0));

        $this->assertNull($this->fault_response->getTransferAmount(0, 0));

        $this->assertNull($this->one_transfer->getTransferAmount(2, 0));
        $this->assertEquals('183.85', $this->one_transfer->getTransferAmount(0, 1));
        $this->assertEquals('183.85', $this->one_transfer->getTransferAmount(0, 2));

        $this->assertNull($this->two_transfer->getTransferAmount(2, 0));
        $this->assertEquals('180.85', $this->two_transfer->getTransferAmount(0, 1));
        $this->assertEquals('180.85', $this->two_transfer->getTransferAmount(0, 2));

        $this->assertEquals('3.00', $this->two_transfer->getTransferAmount(1, 1));
        $this->assertEquals('3.00', $this->two_transfer->getTransferAmount(1, 2));


    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertEquals('IT18U0306909400100000009138', $this->one_transfer->getTransferIban(0, 0));
        $this->assertEquals('IT18U0306909400100000009138', $this->two_transfer->getTransferIban(0, 0));
        $this->assertEquals('IT18U0306909400100000009139', $this->two_transfer->getTransferIban(1, 0));

        $this->assertNull($this->fault_response->getTransferIban(0, 0));


        $this->assertEquals('IT18U0306909400100000009138', $this->one_transfer->getTransferIban(0, 1));
        $this->assertEquals('IT18U0306909400100000009138', $this->one_transfer->getTransferIban(0, 2));

        $this->assertEquals('IT18U0306909400100000009138', $this->two_transfer->getTransferIban(0, 1));
        $this->assertEquals('IT18U0306909400100000009139', $this->two_transfer->getTransferIban(1, 1));
        $this->assertEquals('IT18U0306909400100000009138', $this->two_transfer->getTransferIban(0, 2));
        $this->assertEquals('IT18U0306909400100000009139', $this->two_transfer->getTransferIban(1, 2));

    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->one_transfer->isBollo(0, 0));
        $this->assertFalse($this->two_transfer->isBollo(0, 0));
        $this->assertFalse($this->two_transfer->isBollo(1, 0));

        $this->assertFalse($this->fault_response->isBollo(0, 0));

        $this->assertFalse($this->one_transfer->isBollo(2, 0));
        $this->assertFalse($this->one_transfer->isBollo(0, 1));
        $this->assertFalse($this->one_transfer->isBollo(0, 2));

        $this->assertFalse($this->two_transfer->isBollo(3, 0));
        $this->assertFalse($this->two_transfer->isBollo(0, 1));
        $this->assertFalse($this->two_transfer->isBollo(0, 1));

    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertTrue($this->fault_response->isFaultEvent());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertEquals('PPT_ERRORE_EMESSO_DA_PAA', $this->fault_response->getFaultCode());

    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertEquals('Errore restituito dalla PAA.', $this->fault_response->getFaultString());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertEquals(2, $this->metadata_response->getTransferMetaDataCount(0));
        $this->assertEquals(3, $this->metadata_response->getTransferMetaDataCount(1));
        $this->assertEquals(0, $this->metadata_response->getTransferMetaDataCount(2));
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertEquals('chiave_transfer_1_1', $this->metadata_response->getTransferMetaDataKey(0, 0, 0));
        $this->assertEquals('chiave_transfer_1_2', $this->metadata_response->getTransferMetaDataKey(0, 0, 1));
        $this->assertNull($this->metadata_response->getTransferMetaDataKey(0, 0, 2));

        $this->assertEquals('chiave_transfer_2_1', $this->metadata_response->getTransferMetaDataKey(1, 0, 0));
        $this->assertEquals('chiave_transfer_2_2', $this->metadata_response->getTransferMetaDataKey(1, 0, 1));
        $this->assertEquals('chiave_transfer_2_3', $this->metadata_response->getTransferMetaDataKey(1, 0, 2));

        $this->assertNull($this->metadata_response->getTransferMetaDataKey(1, 0, 3));
        $this->assertNull($this->metadata_response->getTransferMetaDataKey(2, 0, 0));
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertEquals('value_transfer_1_1', $this->metadata_response->getTransferMetaDataValue(0, 0, 0));
        $this->assertEquals('value_transfer_1_2', $this->metadata_response->getTransferMetaDataValue(0, 0, 1));
        $this->assertNull($this->metadata_response->getTransferMetaDataValue(0, 0, 2));

        $this->assertEquals('value_transfer_2_1', $this->metadata_response->getTransferMetaDataValue(1, 0, 0));
        $this->assertEquals('value_transfer_2_2', $this->metadata_response->getTransferMetaDataValue(1, 0, 1));
        $this->assertEquals('value_transfer_2_3', $this->metadata_response->getTransferMetaDataValue(1, 0, 2));

        $this->assertNull($this->metadata_response->getTransferMetaDataValue(1, 0, 3));
        $this->assertNull($this->metadata_response->getTransferMetaDataValue(2, 0, 0));
    }

}
