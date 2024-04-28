#include <bits/stdc++.h>
using namespace std;
string str;
int dp[12][92][2];
int f(int pos, int n, int sum,int flag)
{
if(pos > n) return sum; 
if(dp[pos][sum][flag] != -1) return dp[pos][sum][flag]; 
int limit = 9;
if(flag == false) limit = (str[pos-1]-'0'); 
int total = 0,k = 0;
for(int i = 0; i <= limit; i++)
{
if(flag || i < limit) 
{
k = f(pos+1,n,sum+i,true);
total += k;
}else 
{
k = f(pos+1,n,sum+i,false);
total += k;
}
}
return dp[pos][sum][flag] = total;
}
int main()
{
memset(dp,-1,sizeof dp);
cin >> str;
cout << f(1,str.size(),0,false) << endl;
}