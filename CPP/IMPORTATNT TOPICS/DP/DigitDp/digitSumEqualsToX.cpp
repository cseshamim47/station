#include <bits/stdc++.h>
using namespace std;


string str;
int dp[12][92][2];
int x;
string num;

int f(int pos, int n, int sum,int flag)
{   
    if(pos > n)
    {
        return sum == x;
    }

    int limit = 9;
    if(flag == false) limit = (str[pos-1]-'0'); 

    int total = 0;
    for(int i = 0; i <= limit; i++)
    {
        if(flag || i < limit) 
        {
            total += f(pos+1,n,sum+i,true);
        }else 
        {
            total += f(pos+1,n,sum+i,false);
        }
    }

    return dp[pos][sum][flag] = total;
}


int main()
{
    memset(dp,-1,sizeof dp);
    
    cin >> str >> x;
    int a = f(1,str.size(),0,false);
    cout << a << endl;

}