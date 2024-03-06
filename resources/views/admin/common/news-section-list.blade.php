@php
    $array = [
        1=> 'green',
        2=> 'blue',
        3=> 'red',
    ];
@endphp
<tr>
    <td style="position: relative;">
        @php $flag=0; @endphp
        @for($i=0; $i<count($stack); $i++)
            @php $flag=1; @endphp
            <span style="position: absolute; top: 0; bottom: 0; width: 2px; background-color: {{$array[$i+1]}};"></span>
            &nbsp;&nbsp;
        @endfor
        {{$li->name}}
    </td>

    <td>{{$li->slug}}</td>
    <td>
        @include('admin.common.status')
    </td>
    <td>
        <div class="app-utility-item app-user-dropdown dropdown">
            <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown"
                href="#" role="button" aria-expanded="false"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear icon"
                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z" />
                <path fill-rule="evenodd"
                    d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z" />
            </svg></a>
            <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                <li><a class="dropdown-item" href="{{route('admin.section-edit', Crypt::encrypt($li->id))}}">Edit</a></li>
                <li><a class="dropdown-item" href="{{route('admin.section-delete', Crypt::encrypt($li->id))}}">Delete</a></li>
                @if ($li->status == "Active" || $li->status == "Unpublished")
                    <li><a class="dropdown-item" href="{{route('admin.section-publish', Crypt::encrypt($li->id))}}">Publish</a></li>
                @endif
                @if ($li->status == "Published")
                    <li><a class="dropdown-item" href="{{route('admin.section-publish', Crypt::encrypt($li->id))}}">Unpublish</a></li>
                @endif
                <li><a class="dropdown-item" href="{{route('admin.add-sub-category', Crypt::encrypt($li->id))}}">Add Sub Category</a></li>
            </ul>
        </div>
    </td>
</tr>
@if ($li->childSection->count()>0)
    @foreach ($li->childSection as $li)
    @php
        array_push($stack, 1);
    @endphp
        @include('admin.common.news-section-list')
    @php
        array_pop($stack);
    @endphp
    @endforeach
@endif

