<li class="hm-minicart d-flex">
    @php
        $totalPrice = 0; // Initialize total price variable
    @endphp

    @foreach ($card_elements as $card_element)
        @php
            $totalPrice += $card_element->price; // Update total price
        @endphp
    @endforeach

    <div class="hm-minicart-trigger">
        <span class="item-icon"></span>
        <span class="item-text">
            ${{ $totalPrice }}
            <span class="cart-item-count">{{ $card_elements->count() }}</span>
        </span>
    </div>

    <span></span>

    <div class="minicart">
        <ul class="minicart-product-list">
            @if ($card_elements->isNotEmpty())
                @foreach ($card_elements as $card_element)
                    <li>
                        <a href="{{ route('details', $card_element->product_id) }}" class="minicart-product-image">
                            <img src="{{ asset('storage/images/products/' . $card_element->image) }}"
                                alt="cart products">
                        </a>
                        <div class="minicart-product-details">
                            <h6><a href="{{ route('details', $card_element->product_id) }}">{{ $card_element->product_name }}</a></h6>
                            <span>${{ $card_element->price_one }} x {{ $card_element->quantity }}</span>
                        </div>
                        <button class="close">
                            <a href="{{ route('delete.card', $card_element->id) }}"><i class="fa fa-close"></i></a>
                        </button>
                    </li>
                @endforeach
            @endif
        </ul>

        <p class="minicart-total">TOTAL: <span>${{ $totalPrice }}</span></p>

        <div class="minicart-button">
            <a href="{{ route('card') }}" class="li-button li-button-dark li-button-fullwidth li-button-sm">
                <span>View Full Cart</span>
            </a>
            <a href="{{route('checkout')}}" class="li-button li-button-fullwidth li-button-sm">
                <span>Checkout</span>
            </a>
        </div>
    </div>
</li>

<!-- Add the following script after your existing script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function updateCart() {
            fetch('/api/cart')
                .then(response => response.json())
                .then(data => {
                    document.querySelector('.cart-item-count').textContent = data.cart_elements.length;
                    document.querySelector('.minicart-total span').textContent = '$' + data.total_price;

                    const minicartProductList = document.querySelector('.minicart-product-list');
                    minicartProductList.innerHTML = '';

                    data.cart_elements.forEach(card_element => {
                        const listItem = document.createElement('li');
                        listItem.innerHTML = `
                            <a href="single-product.html" class="minicart-product-image">
                                <img src="${card_element.image}" alt="cart products">
                            </a>
                            <div class="minicart-product-details">
                                <h6><a href="single-product.html">${card_element.product_name}</a></h6>
                                <span>$${card_element.price_one} x ${card_element.quantity}</span>
                            </div>
                            <button class="close">
                                <a href="${'delete.card/' + card_element.id}"><i class="fa fa-close"></i></a>
                            </button>
                        `;
                        minicartProductList.appendChild(listItem);
                    });
                })
                .catch(error => console.error('Error updating cart:', error));
        }

        updateCart();
    });
</script>
