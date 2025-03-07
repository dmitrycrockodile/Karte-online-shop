import axios from "axios";
import { handleResponse, handleError } from "../utils/helpers";
import { BASE_API_URL } from "../utils/constants";

export const addReview = async (formData) => {
   try {
      const res = await axios.post(`${BASE_API_URL}/review`, {
         rating: formData.rating,
         title: formData.title,
         body: formData.body,
         model: formData.model,
         id: formData.id,
      });
      return handleResponse(res);
   } catch (err) {
      return handleError(err);
   }
};

export const deleteReview = async (id) => {
   try {
      const res = await axios.delete(`${BASE_API_URL}/review/${id}}`);
      return handleResponse(res);
   } catch (err) {
      return handleError(err);
   }
};

export const reportOnReview = async (id) => {
   try {
      const res = await axios.patch(`${BASE_API_URL}/review/report/${id}}`);
      return handleResponse(res);
   } catch (err) {
      return handleError(err);
   }
};

export const markHelpful = async (id, isHelpful) => {
   try {
      const res = await axios.patch(`${BASE_API_URL}/review/mark-helpfulness/${id}`, {
         isHelpful: isHelpful
      });
      return handleResponse(res);
   } catch (err) {
      return handleError(err);
   }
};