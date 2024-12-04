import axios from "axios";
import { BASE_API_URL } from "../utils/constants";
import { handleResponse, handleError } from "../utils/helpers";

export const updateUserData = async (id, newData) => {
   try {
      const res = await axios.patch(`${BASE_API_URL}/user/update/${id}`, newData);
      return handleResponse(res);
   } catch (err) {
      return handleError(err);
   }
};

export const updateUserEmail = async (id, email, password) => {
   try {
      const res = await axios.patch(`${BASE_API_URL}/user/update/email/${id}`, { email, password });
      return handleResponse(res);
   } catch (err) {
      return handleError(err);
   }
};

export const updateUserPassword = async (id, password, newPassword) => {
   try {
      const res = await axios.patch(`${BASE_API_URL}/user/update/password/${id}`, { 
         new_password: newPassword, 
         password: password,
      });
      return handleResponse(res);
   } catch (err) {
      return handleError(err);
   }
};

export const updateUserSubscription = async (id) => {
   try {
      const res = await axios.patch(`${BASE_API_URL}/user/update/subscription/${id}`);
      return handleResponse(res);
   } catch (err) {
      return handleError(err);
   }
};