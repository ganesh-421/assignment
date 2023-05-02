<x-layout>

    <!-- Main Content -->
    <div class="container py-5">
        <div class="row">

            <!-- Blog Entries -->
            <div class="col-md-12">

                <!-- Blog Post 1 -->
                @php
                    $half = count($posts) / 2;
                @endphp
                <div class="row">
                    @if ($half >= 1)
                        <div class="col-md-6">
                            @foreach ($posts->take($half) as $post)
                                <x-posts.post-card :post="$post" />
                            @endforeach
                        </div>
                        <div class="col-md-6">
                            @foreach ($posts->skip($half) as $post)
                                <x-posts.post-card :post="$post" />
                            @endforeach
                        </div>
                    @else
                        <div class="col-md-12">
                            @foreach ($posts as $post)
                                <x-posts.post-card :post="$post" />
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</x-layout>
