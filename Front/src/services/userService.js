import axios from "axios";
import { BASE_API_URL } from "../utils/constants";

export const updateUserData = async (id, newData) => {
   try {
      const res = await axios.patch(`${BASE_API_URL}/user/update/${id}`, newData);

      if (res.status === 200) {
         return { 
            newUser: res.data.new_user, 
            success: res.data.success, 
            message: res.data.message 
         };
      }
   } catch (err) {
      return { message: err.response?.data?.message || 'An error occured', success: false };
   }
};

export const updateUserEmail = async (id, email, password) => {
   try {
      const res = await axios.patch(`${BASE_API_URL}/user/update/email/${id}`, { email, password });


      if (res.status === 200) {
         return { 
            newEmail: res.data.new_email, 
            success: res.data.success, 
            message: res.data.message 
         };
      }
   } catch (err) {
      return { message: err.response?.data?.message || 'An error occured', success: err.response?.data?.success || false };
   }
};

export const updateUserPassword = async (id, password, newPassword) => {
   try {
      const res = await axios.patch(`${BASE_API_URL}/user/update/password/${id}`, { 
         new_password: newPassword, 
         password: password,
      });

      if (res.status === 200) {
         return { 
            success: res.data.success, 
            message: res.data.message 
         };
      }
   } catch (err) {
      return { message: err.response?.data?.message || 'An error occured', success: err.response?.data?.success || false };
   }
};

export const updateUserSubscription = async (id) => {
   try {
      const res = await axios.patch(`${BASE_API_URL}/user/update/subscription/${id}`);

      if (res.status === 201) {
         return { 
            success: res.data.success, 
            message: res.data.message,
            isSubscribed: res.data.is_subscribed
         };
      }
   } catch (err) {
      console.error(err);

      return { message: err.response?.data?.message || 'An error occured', success: false };
   }
};