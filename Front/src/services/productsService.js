import axios from "axios";
import router from '../router/index';
import { handleResponse, handleError } from "../utils/helpers";
import { BASE_API_URL } from "../utils/constants";

export const getProduct = async (id) => {
   try {
      const res = await axios.get(`${BASE_API_URL}/products/${id}`);
      return handleResponse(res);
   } catch (err) {
      if (err.response.status === 404) {
         router.push({ name: 'notFound', params: { catchAll: 'not-found' } })
      }
      return handleError(err);
   }
};

export const getRecentProducts = async () => {
   try {
      const res = await axios.post(`${BASE_API_URL}/products`, {
        tags: { title: "new" },
      });
      return handleResponse(res);
   } catch (err) {
      return handleError(err);
   }
};

export const getProducts = async (args) => {
   try {
      const res = await axios.post(`${BASE_API_URL}/products`, args);
      console.log(res)
      return handleResponse(res);
   } catch (err) {
      return handleError(err);
   }
};

export const getProductFilters = async () => {
   try {
      const res = await axios.get(`${BASE_API_URL}/products/filters`);
      return handleResponse(res);
   } catch (err) {
      return handleError(err);
   }
};