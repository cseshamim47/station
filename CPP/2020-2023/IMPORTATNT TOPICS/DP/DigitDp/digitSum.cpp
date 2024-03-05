#include <bits/stdc++.h>
using namespace std;


string str;
int dp[12][92][2];
int f(int pos, int n, int sum,int flag)
{
    if(pos > n)
    {
        cout << "#sum " << sum << endl;
        return sum;
    }
    if(dp[pos][sum][flag] != -1) return dp[pos][sum][flag]; 
    int limit = 9;
    if(flag == false) limit = (str[pos-1]-'0'); 

    cout << "pos - > " << pos << endl;
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
        cout << pos << " " <<   k << endl;
    }
    return dp[pos][sum][flag] = total;
}


int main()
{
    //    Bismillah
    memset(dp,-1,sizeof dp);
    // cin >> str; // n digits
    // cout << f(1,str.size(),0,false) << endl; // from 1 digit sum to N digit sum

    cin >> str;
    // str[str.size()-1] = str[str.size()-1]-1;
    // int a = f(1,str.size(),0,false);

    // memset(dp,-1,sizeof dp);
    // cin >> str;
    // int b = f(1,str.size(),0,false);

    // cout << b-a << endl;
    cout << f(1,str.size(),0,false) << endl;

}