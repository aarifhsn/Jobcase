<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0">
    <channel>
        <title>Job Board - Job Posts</title>
        <link>{{ url('/') }}</link>
        <description>Latest job postings</description>
        <language>en-us</language>
        <pubDate>{{ now()->toRfc2822String() }}</pubDate>

        @foreach($jobs as $job)
        <item>
            <title>{{ $job->title }}</title>
            <link>{{ route('job-details', $job->id) }}</link>
            <description><![CDATA[
                {{ $job->description }}
            ]]></description>
            <pubDate>{{ $job->created_at->toRfc2822String() }}</pubDate>
            <guid>{{ route('job-details', $job->id) }}</guid>
        </item>
        @endforeach
    </channel>
</rss>
