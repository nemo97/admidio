import axios, { AxiosResponse, AxiosRequestConfig } from 'axios';

const client = axios.create({
  baseURL: 'http://192.168.1.133:9080/',
});
const defaultErrorRes : JsonResponseUserToken = {
    'error':'Y',
    errorDetails: ['Something went wrong!']
  };
const config: AxiosRequestConfig = {
    headers: {
      'Accept': 'application/json',
    },
};
export type MemberInfo = {
    member_id : number, 
    member_name : string,  
    member_status: number,
    member_status_desc: string ,
    member_email: string,
    token_count: number
}
export type MemberTokenInfo = {
    iss_id: number,
    member_id : number, 
    token_text: number,
    token_status: string ,
    token_status_desc: string ,
    token_redeem_date: string,    
}
type JsonResponseBase = {
    error?: string,
    errorDetails?: string[],
    action?: string    
}
export type JsonResponseUser  = JsonResponseBase & {    
    result? : MemberInfo[]
}
export type JsonResponseUserToken  = JsonResponseBase & {    
    result? : MemberTokenInfo[]
}
export const getUserData  = async () : Promise<JsonResponseUser> => {
    try {
        const searchResponse: AxiosResponse<JsonResponseUser> = await client.get(`/api/members_to_issues.php`, config);
        console.log(searchResponse.data);
        //if(searchResponse.data && searchResponse.data["error"] !== "Y" ){
            // success
            //const result : MemberInfo[] = searchResponse.result;

            return searchResponse.data; 
        //}
        //const foundUsers: MemberInfo[] = searchResponse.data.js;
    
        // const username: string = foundUsers[0].login;
        // const userResponse: AxiosResponse = await client.get(`/users/${username}`, config);
        // const user: githubUser = userResponse.data;
        // const followersCount = user.followers;
    
        //console.log(`The most followed user on GitHub is "${username}" with ${followersCount} followers.`)
      } catch(err) {
        console.log(err);
      } 
      const r : JsonResponseUser = {
        'error':'Y'
      };
      return r;
}

export const getUserTokenData  = async (member_id : number) : Promise<JsonResponseUserToken> => {
    try {
        const queryString: string = `action=GET_TOKENS&member_id=${member_id}`;
        const searchResponse: AxiosResponse<JsonResponseUserToken> = await client.get(`/api/members_to_issues.php?${queryString}`, config);
        console.log(searchResponse.data);
        //if(searchResponse.data && searchResponse.data["error"] !== "Y" ){
            // success
            //const result : MemberInfo[] = searchResponse.result;

            return searchResponse.data; 
        //}
        //const foundUsers: MemberInfo[] = searchResponse.data.js;
    
        // const username: string = foundUsers[0].login;
        // const userResponse: AxiosResponse = await client.get(`/users/${username}`, config);
        // const user: githubUser = userResponse.data;
        // const followersCount = user.followers;
    
        //console.log(`The most followed user on GitHub is "${username}" with ${followersCount} followers.`)
      } catch(err) {
        console.log(err);
      } 
     
      return defaultErrorRes;
}

export const deleteUserToken  = async (member_id : number, iss_id : number) : Promise<JsonResponseUserToken> => {
    try {        
        const data = {'member_id': member_id,'iss_id' : iss_id , 'action' : 'DELETE_TOKEN'};
        const searchResponse: AxiosResponse<JsonResponseUserToken> = await client.post(`/api/members_to_issues.php`,data, config);
        console.log(searchResponse.data);
        //if(searchResponse.data && searchResponse.data["error"] !== "Y" ){
            // success
            //const result : MemberInfo[] = searchResponse.result;

        return searchResponse.data; 
        //}
        //const foundUsers: MemberInfo[] = searchResponse.data.js;
    
        // const username: string = foundUsers[0].login;
        // const userResponse: AxiosResponse = await client.get(`/users/${username}`, config);
        // const user: githubUser = userResponse.data;
        // const followersCount = user.followers;
    
        //console.log(`The most followed user on GitHub is "${username}" with ${followersCount} followers.`)
      } catch(err) {
        console.log(err);
      } 
      
      return defaultErrorRes;
}

export const undoUserToken  = async (member_id : number, iss_id : number) : Promise<JsonResponseUserToken> => {
    try {        
        const data = {'member_id': member_id,'iss_id' : iss_id , 'action' : 'UNDO_TOKEN'};
        const searchResponse: AxiosResponse<JsonResponseUserToken> = await client.post(`/api/members_to_issues.php`,data, config);
        console.log(searchResponse.data);
        //if(searchResponse.data && searchResponse.data["error"] !== "Y" ){
            // success
            //const result : MemberInfo[] = searchResponse.result;

        return searchResponse.data; 
        //}
        //const foundUsers: MemberInfo[] = searchResponse.data.js;
    
        // const username: string = foundUsers[0].login;
        // const userResponse: AxiosResponse = await client.get(`/users/${username}`, config);
        // const user: githubUser = userResponse.data;
        // const followersCount = user.followers;
    
        //console.log(`The most followed user on GitHub is "${username}" with ${followersCount} followers.`)
      } catch(err) {
        console.log(err);
      } 
     
      return defaultErrorRes;
}


export const issueSingleUserToken  = async (member_id : number) : Promise<JsonResponseUserToken> => {
    try {        
        const data = {'member_id': member_id, 'action' : 'ISSUE_SINGLE_TOKEN'};
        const searchResponse: AxiosResponse<JsonResponseUserToken> = await client.post(`/api/members_to_issues.php`,data, config);
        console.log(searchResponse.data);
        //if(searchResponse.data && searchResponse.data["error"] !== "Y" ){
            // success
            //const result : MemberInfo[] = searchResponse.result;

        return searchResponse.data; 
        //}
        //const foundUsers: MemberInfo[] = searchResponse.data.js;
    
        // const username: string = foundUsers[0].login;
        // const userResponse: AxiosResponse = await client.get(`/users/${username}`, config);
        // const user: githubUser = userResponse.data;
        // const followersCount = user.followers;
    
        //console.log(`The most followed user on GitHub is "${username}" with ${followersCount} followers.`)
      } catch(err) {
        console.log(err);
      } 
      
      return defaultErrorRes;
}