import axios from "axios";
import { BASE_API_URL } from "../utils/constants";

export const addReview = async (formData, productId) => {
   try {
      const res = await axios.post(`${BASE_API_URL}/review`, {
         rating: formData.rating,
         title: formData.title,
         body: formData.body,
         product_id: productId,
      });

      if (res.status === 200) {
         return { success: res.data.success, data: res.data };
      }
   } catch (err) {
      return { message: err.res?.data?.message || 'An error occurred' };
   }
};

export const deleteReview = async (id) => {
   try {
      const res = await axios.delete(`${BASE_API_URL}/review/${id}}`);

      if (res.status === 200) {
         return { success: res.data.success, message: res.data.message }
      }
   } catch (err) {
      console.error(err);
      return { message: err.res?.data?.message || 'An error occurred' };
   }
};

export const reportOnReview = async (id) => {
   try {
      const res = await axios.patch(`${BASE_API_URL}/review/report/${id}}`);

      if (res.status === 200) {
         return { success: res.data.success, message: res.data.message, review: res.data.review };
      }
   } catch (err) {
      console.error(err)

      return { message: err.res?.data?.message || 'An error occured' };
   }
};

export const markHelpful = async (id, isHelpful) => {
   try {
      const res = await axios.patch(`${BASE_API_URL}/review/mark-helpfulness/${id}`, {
         isHelpful: isHelpful
      });
      
      if (res.status === 200) {
         return { success: res.data.success, message: res.data.message, review: res.data.review };
      }
   } catch (err) {
      console.error(err)

      return { message: err.res?.data?.message || 'An error occured' }
   }
};