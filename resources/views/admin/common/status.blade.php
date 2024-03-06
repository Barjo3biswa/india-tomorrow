
@if($li->status=="Active")
    <span class="badge bg-secondary">Active</span>
@elseif($li->status=="Published")
    <span class="badge bg-primary">Published</span>
@elseif($li->status=="Unpublished")
    <span class="badge bg-warning">Unpublished</span>
@endif
