<div>

    <h2>Cart Content</h2>
  
        <table class="table bordered">
            
            @foreach ($carts as $cart)
            <tr>
                <td>{{ $cart['name'] }}</td>
                <td></td>
                <td class="d-flex">
                    {{-- <livewire:cart-update :cart="$cart" :key="$cart['rowId']"/> --}}
                    <form wire:submit.prevent="update('{{$cart['rowId']}}')" action="#" method="post">
                        @csrf
                        <input class="w-25" type="number" wire:model="updatedQty.{{ $cart['rowId'] }}" max="10">
                        <button class="btn btn-dark" type="submit">update</button>
                    </form>
                    <form wire:submit.prevent="remove('{{$cart['rowId']}}')" action="{{ route('cart.remove') }}" method="post">
                        @csrf
                        <button class="btn btn-danger" type="submit">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
</div>
