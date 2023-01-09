import React, {
	createContext,
	useContext,
	useEffect,
	useMemo,
	useState,
} from 'react'
import axios from "axios";
import {API_URL} from "@env"
const AuthContext = createContext({})

export const AuthProvider = ({ children }) => {
	const [user, setUser] = useState("tim")
	const [isLoadingInitial, setIsLoadingInitial] = useState(true)
	const [isLoading, setIsLoading] = useState(false)
	const  [aToken, setAtoken] =  useState(null)
	const  [data, setData] =  useState()
	
	const login = async (email, password) => {
		try {
			// setIsLoading(true)
			var responseJson = null;
			responseJson = await (await axios
			.post(API_URL+"login",{
				headers: {
					"Content-Type": "application/json"
				},
				body: JSON.stringify({'email': email, 'password': password})
			}))
			
			if(responseJson){
				
				await AsyncStorage.setItem('aToken',responseJson.data.accessToken)
				setAtoken(await AsyncStorage.getItem('aToken'))
			}
			
		} catch (error) {
			alert(error)
		} finally {
			// setIsLoading(false)
		}
		

	}
	const logout = async () => {
		// setIsLoading(true)
		await AsyncStorage.removeItem('aToken')
		setAtoken(null)
		
	}
	
		async ()=>{
			const token = await AsyncStorage.getItem('aToken')
			console.log(token)
			setAtoken(token)
		}
		
		
	
	const values = useMemo(
		() => ({

			aToken,
			login: login,
			logout: logout,
		}),
		[aToken]
	)

	return (
		<AuthContext.Provider value={values}>
			{ children}
		</AuthContext.Provider>
	)
}

export const useAuth = () => useContext(AuthContext)
