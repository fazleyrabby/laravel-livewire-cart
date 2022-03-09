<div>
    
    <div id="alert">

    </div>
    
    <div class="float-end">
        <a href="#" class="btn btn-danger" wire:click.prevent="clearAllCart">Remove All Cart</a>
    </div>
    <table class="table bordered">
        
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->title }}</td>
            <td>{{ $product->price }}</td>
            <td>   
                <form wire:submit.prevent="addToCart({{$product->id}})" action="{{ route('cart.store') }}" method="post">
                    @csrf
                    <input wire:model='quantity.{{ $product->id }}' type="number">
                    <button class="btn btn-dark" type="submit">Add to cart</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <br>
            <br>
            
</div>

@push('scripts')
    <script>
        // window.addEventListener('updated', function(e){
        //     let type = e.detail.type;
        //     let msg = e.detail.msg;
        //     document.getElementById('alert').innerHTML = `<div class="alert alert-${type} alert-dismissible fw-bold fade show" role="alert">${e.detail.msg}
        //         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        //         </div>`
        // })

        Livewire.on('updated', function(e){
            let type = e.type;
            let msg = e.msg;
            document.getElementById('alert').innerHTML = `<div class="alert alert-${type} alert-dismissible fw-bold fade show" role="alert">${msg}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`
        })
    </script>
@endpush

