<template>
    <main>
        <!--Start Breadcrumb Style2-->
        <section class="breadcrumb-area" :style="{ 'background-image': 'url(../../assets/images/inner-pages/breadcum-bg.png)' }">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-content text-center wow fadeInUp animated">
                            <h2>Cart</h2>
                            <div class="breadcrumb-menu">
                                <ul>
                                    <li><router-link :to="{ name: 'main' }"><i class="flaticon-home pe-2"></i>Home</router-link></li>
                                    <li> <i class="flaticon-next"></i> </li>
                                    <li class="active">Cart</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Breadcrumb Style2-->
        <!--Start cart area-->
        <section class="cart-area pt-120 pb-120">
            <div class="container">
                <div class="row wow fadeInUp animated">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="cart-table-box">
                            <div class="table-outer">
                                <table class="cart-table">
                                    <thead class="cart-header">
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Subtotal</th>
                                            <th class="hide-me"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="cartItem in cartItems">
                                            <td>
                                                <div class="thumb-box"> 
                                                    <router-link :to="{ name: 'products.show', params: { id: cartItem.id } }" class="thumb">
                                                        <img :src="cartItem.image" :alt="cartItem.title">
                                                    </router-link> 
                                                    <router-link :to="{ name: 'products.show', params: { id: cartItem.id } }" class="title">
                                                        <h5> {{ cartItem.title }} </h5>
                                                    </router-link> 
                                                </div>
                                            </td>
                                            <td>${{ cartItem.price.toFixed(2) }}</td>
                                            <td class="qty">
                                                <div class="qtySelector text-center"> 
                                                    <button @click.prevent="decreaseQty(cartItem.id)" class="decreaseQty">
                                                        <i class="flaticon-minus"></i> 
                                                    </button> 
                                                    <input type="number" class="qtyValue" v-model="cartItem.qty" /> 
                                                    <button @click.prevent="addToCart({product: cartItem, selectedQuantity: 1})" class="increaseQty"> 
                                                        <i class="flaticon-plus"></i> 
                                                    </button> 
                                                </div>
                                            </td>
                                            <td class="sub-total">${{ (cartItem.price * cartItem.qty).toFixed(2) }}</td>
                                            <td>
                                                <button @click.prevent="removeFromCart(cartItem.id)" class="remove"> <i class="flaticon-cross"></i> </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="cart-button-box">
                            <div class="apply-coupon wow fadeInUp animated">
                                <div class="apply-coupon-input-box mt-30 "> 
                                    <input type="text" name="coupon-code" value="" placeholder="Coupon Code"> 
                                </div>
                                <div class="apply-coupon-button mt-30"> 
                                    <button class="btn--primary style2" type="submit">Apply Coupon</button> 
                                </div>
                            </div>
                            <div class="cart-button-box-right wow fadeInUp animated"> 
                                <button class="btn--primary mt-30" type="submit">Continue Shopping</button>
                                <button class="btn--primary mt-30" type="submit">Checkout</button> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pt-120">
                    <div class="col-xl-6 col-lg-7 wow fadeInUp animated">
                        <div class="cart-total-box">
                            <div class="inner-title">
                                <h3>Cart Totals</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt--30">
                    <div class="col-xl-6 col-lg-7 wow fadeInUp animated">
                        <div class="cart-total-box mt-30">
                            <div class="table-outer">
                                <table class="cart-table2">
                                    <thead class="cart-header clearfix">
                                        <tr>
                                            <th colspan="1" class="shipping-title">Shipping</th>
                                            <th class="price">${{ totalProductsPrice }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="shipping"> Shipping </td>
                                            <td class="selact-box1">
                                                <ul class="shop-select-option-box-1">
                                                    <li> 

                                                        <input type="checkbox" name="free_shipping" id="option_1" checked=""> 
                                                        <label for="option_1"><span></span>FreeShipping</label> 
                                                    </li>
                                                </ul>
                                                <div class="inner-text">
                                                    <p>Shipping options will be updated during checkout</p>
                                                </div>
                                                <h4>Calculate Shipping</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4 class="total">Total</h4>
                                            </td>
                                            <td class="subtotal">${{ totalProductsPrice }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5 wow fadeInUp animated">
                        <div class="cart-check-out mt-30">
                            <h3>Check Out</h3>
                            <ul class="cart-check-out-list">
                                <li>
                                    <div class="left">
                                        <p>Subtotal</p>
                                    </div>
                                    <div class="right">
                                        <p>${{ totalProductsPrice }}</p>
                                    </div>
                                </li>
                                <li v-if="shippingMethod">
                                    <div class="left">
                                        <p>Shipping</p>
                                    </div>
                                    <div class="right">
                                        <p><span>{{ shippingMethod }}:</span> ${{ countShippingPrice }}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="left">
                                        <p>Total Price:</p>
                                    </div>
                                    <div class="right">
                                        <p>${{ totalPrice }}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End cart area-->
    </main>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex';

    import RadioButton from '@/components/'
    
    import { FLAT_RATE_PROCENT, FLAT_RATE, FREE_SHIPPING, LOCAL_PICKUP } from '@/utils/constants';

    export default {
        name: 'Show',
        data() {
            return {
                increaseBy: 1,
                shippingMethod: null,
            }
        },
        mounted() {
            this.setShippingMethod(LOCAL_PICKUP)
        },
        computed: {
            ...mapGetters({
                'cartItems': 'cart/cartItems',
                'totalProductsPrice': 'cart/totalProductsPrice',
            }),
            totalPrice() {
                return Number(this.totalProductsPrice) + Number(this.countShippingPrice)
            },
            countShippingPrice(){
                switch (this.shippingMethod) {
                    case FLAT_RATE:
                        return this.totalProductsPrice * FLAT_RATE_PROCENT / 100
                    case FREE_SHIPPING: 
                        return 0
                    case LOCAL_PICKUP:
                        return 0
                }
            },
        },
        methods: {
            ...mapActions({
                addToCart: 'cart/addToCart',
                decreaseQty: 'cart/decreaseQty',
                removeFromCart: 'cart/removeFromCart',
            }),
            setShippingMethod(method) {
                this.shippingMethod = method
            },
        }
    }
    
</script>

<style scoped>

</style>