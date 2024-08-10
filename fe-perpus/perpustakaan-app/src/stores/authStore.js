import { ref } from "vue";
import { defineStore } from "pinia";
import { useRouter } from "vue-router";
import { customApi } from "@/config/config";

export const useAuthStore = defineStore("auth", () => {
  const router = useRouter();

  const tokenUser = ref(
    localStorage.getItem("token")
      ? JSON.parse(localStorage.getItem("token"))
      : null
  );

  const currentUser = ref(
    localStorage.getItem("user")
      ? JSON.parse(localStorage.getItem("user"))
      : null
  );

  // const isAuthenticated = ref(false);
  // const loading = ref(false); // Add loading state
  const error = ref(false);
  const message = ref("");

  const register = async (inputData) => {
    try {
      const { name, email, password, password_confirmation } = inputData;
      const {data} = await customApi.post("/auth/register", {
        name,
        email,
        password,
        password_confirmation,
      }); 

      router.push({ name: "login" });
    } catch (error) {
      error.value = true;
      message.value = error.response.data.message;
    }
  };

  const login = async (inputData) => {
    try {
      const { email, password } = inputData;
      const { data } = await customApi.post("/auth/login", {
        email,
        password,
      });
      
      const { token, user } = data;
      
      
      //save localStorage
      localStorage.setItem("token", JSON.stringify(token));
      localStorage.setItem("user", JSON.stringify(user));
      
      //save pinia
      tokenUser.value = token;
      currentUser.value = user; 
      router.push({ name: "home" }); 
      
    } catch (error) {
      error.value = true;
      message.value = error.response.data;
    }
  }; 

  const logout = async () => {
    try {
      const response = await customApi.post("/auth/logout", null, {
        headers: {
          Authorization: `Bearer ${tokenUser.value}`,
        },
      });

      localStorage.removeItem("token", null);
      localStorage.removeItem("user", null);

      tokenUser.value = null;
      currentUser.value = null;


      router.push({ name: "login" });
    } catch (error) {
      console.log(error);
      
    }
  };

  return {
    currentUser,
    tokenUser,
    error,
    register,
    login, 
    logout,
  };
});
