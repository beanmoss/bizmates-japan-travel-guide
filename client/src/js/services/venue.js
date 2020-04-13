import axios from 'axios';

const API_URL = 'http://localhost:8080/api';

const api = axios.create({
  baseURL: API_URL,
});

exports.get = (location) => {
  return api.get(`/venue/${location}`);
}