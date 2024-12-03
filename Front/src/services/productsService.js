import axios from "axios";
import { BASE_API_URL } from "../utils/constants";

export const getProduct = async (id) => {
   try {
      const res = await axios.get(`${BASE_API_URL}/products/${id}`);
      
      if (res.status === 200) {
         return { success: res.data.success, product: res.data.product };
      }
   } catch (err) {
      console.error(err.message);
   }
};

export const getRecentProducts = async () => {
   try {
      const res = await axios.post(`${BASE_API_URL}/products`, {
        tags: { title: "new" },
      });

      if (res.status === 200) {
         return { success: true, data: res.data.data };
      }
   } catch (err) {
      console.error(err.message);
   }
};

export const getProducts = async (args) => {
   try {
      const res = await axios.post(`${BASE_API_URL}/products`, args);

      if (res.status === 200) {
         return { success: res.data.success, products: res.data.products };
      }
   } catch (err) {
      console.error(err.message);
   }
};

export const getProductFilters = async () => {
   try {
      const res = await axios.get(`${BASE_API_URL}/products/filters`);

      if (res.status === 200) {
         return { data: res.data, success: true };
      }
   } catch (err) {
      console.error(err.message);
   }
};