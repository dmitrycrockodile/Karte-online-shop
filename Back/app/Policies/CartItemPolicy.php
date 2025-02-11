<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CartItem;

class CartItemPolicy
{
    /**
     * Determine if the user can update a product in cart.
     * 
     * @param User $user The user performing the action
     * @param CartItem $cartItem The item user's trying to update
    */
    public function update(User $user, CartItem $cartItem) {
        return $user->id === $cartItem->user_id;
    }

    /**
     * Determine if the user can delete a product from cart.
     * 
     * @param User $user The user performing the action
     * @param CartItem $cartItem The item user's trying to delete
    */
    public function delete(User $user, CartItem $cartItem) {
        return $user->id === $cartItem->user_id;
    }
}
