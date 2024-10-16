import axios, { AxiosResponse, AxiosRequestConfig } from 'axios';

const client = axios.create({
  baseURL: 'https://bcaa.subhas.dev/',
  
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
    mem_uuid : string,
    member_id : number, 
    member_name : string,  
    member_status: number,
    member_status_desc: string ,
    member_email: string,
    token_count: string,
    guest_count : number,
    sent_status: string,
    sent_date : string
}

export type MemberTokenInfo = {
    iss_id: number,
    member_id : number, 
    token_text: number,
    status: string ,
    event_id: number,
    event_desc: string,
    redeem_id : string,
    sent_status: string,
    sent_date: string,
    token_redeem_date: string,    
}
export type EventInfo = {
  event_id: number,
  status : string, 
  description: string,
     
}
export type SummeryInfo = {
  guest_count: number,
  total_redeem_count : number,
  total_checkin_count : number,  
}
type JsonResponseBase = {
    error?: string,
    errorDetails?: string[],
    action?: string    
}
export type JsonResponseUser  = JsonResponseBase & {    
    result? : MemberInfo[],
    summery? : SummeryInfo[]
}
export type JsonResponseUserToken  = JsonResponseBase & {    
    result? : MemberTokenInfo[]
}
export type JsonResponseEvent  = JsonResponseBase & {    
  result? : EventInfo[]
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

export const getEventData  = async () : Promise<JsonResponseEvent> => {
  const r : JsonResponseEvent = {
    'error':'Y'
  };
  try {
      const queryString: string = `action=GET_EVENTS`;
      const searchResponse: AxiosResponse<JsonResponseEvent> = await client.get(`/api/members_to_issues.php?${queryString}`, config);
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
    } catch(e : unknown) {
      let m : string = '';
      if (typeof e === "string") {
        m = e.toUpperCase() // works, `e` narrowed to string
    } else if (e instanceof Error) {
        m = e.message // works, `e` narrowed to Error
    }
      //console.log(err);
      r.errorDetails = [m];
    } 
   
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

export const undoUserToken  = async (member_id : number, redeem_id : string) : Promise<JsonResponseUserToken> => {
    try {        
        const data = {'member_id': member_id,'redeem_id' : redeem_id , 'action' : 'UNDO_TOKEN'};
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

export const updateEvent  = async (event_id : number) : Promise<JsonResponseUserToken> => {
  let r = defaultErrorRes;
  try {        
      const data = {'event_id': event_id, 'action' : 'SET_EVENT'};
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
    } catch(e : unknown) {
      let m : string = '';
      if (typeof e === "string") {
        m = e.toUpperCase() // works, `e` narrowed to string
      } else if (e instanceof Error) {
        m = e.message // works, `e` narrowed to Error
      }
      console.log(e);
      r.errorDetails = [m];
    } 
    return r;
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

export const issueSingleUserSendEmail  = async (member_id : number) : Promise<JsonResponseUserToken> => {
  try {        
      const data = {'member_id': member_id, 'action' : 'SEND_SINGLE_EMAIL'};
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
      throw err;
    } 
    
    return defaultErrorRes;
}

export const sendUserEmailALL  = async () : Promise<JsonResponseUserToken> => {
  try {        
      const data = {'action' : 'send_email_active_members'};
      const searchResponse: AxiosResponse<JsonResponseUserToken> = await client.post(`/api/members_to_issues.php`,data, config);
      console.log(searchResponse.data); 
      return searchResponse.data;  
    } catch(err) {
      console.log(err);
      throw err;
    } 
    
    return defaultErrorRes;
}
export const issueUserTokenALL = async () : Promise<JsonResponseUserToken> => {
  try {        
      const data = {'action' : 'issue_all_active_members'};
      const searchResponse: AxiosResponse<JsonResponseUserToken> = await client.post(`/api/members_to_issues.php`,data, config);
      console.log(searchResponse.data); 
      return searchResponse.data;  
    } catch(err) {
      console.log(err);
      throw err;
    } 
    
    return defaultErrorRes;
}