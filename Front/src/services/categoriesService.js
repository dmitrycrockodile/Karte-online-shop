import axios from "axios";
import { BASE_API_URL } from "../utils/constants";

export const getCategories = async () => {
   try {
      const res = await axios.get(`${BASE_API_URL}/categories`);

      if (res.status === 200) {
         return { success: res.data.success, categories: res.data.categories }
      }
   } catch (err) {
      console.error(err);
   }
};

export const getCategory = async (id) => {
   try {
      const res = await axios.get(`${BASE_API_URL}/categories/${id}`);

      if (res.status === 200) {
         return { success: res.data.success, category: res.data.category };
      }
   } catch (err) {
      console.error(err);
   }
};