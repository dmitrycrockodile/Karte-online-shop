import axios from "axios";
import { handleResponse, handleError } from "../utils/helpers";
import { BASE_API_URL } from "../utils/constants";

export const getCategories = async () => {
   try {
      const res = await axios.get(`${BASE_API_URL}/categories`);
      return handleResponse(res);
   } catch (err) {
      return handleError(err);
   }
};

export const getCategory = async (id) => {
   try {
      const res = await axios.get(`${BASE_API_URL}/categories/${id}`);
      return handleResponse(res);
   } catch (err) {
      return handleError(err);
   }
};