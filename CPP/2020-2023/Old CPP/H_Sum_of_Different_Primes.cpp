#include <bits/stdc++.h>
using namespace std;


bool isPrime[1205];
vector<int> prime;
void sieve(int n)
{
    for(int i = 2; i <= n; i++)
    {
        if(isPrime[i] == false)
        {
            for(int j = i+i; j <= n; j+=i)
            {
                isPrime[j] = true;
            }
        }
    }

    
    for(int i = 2; i <= n; i++)
    {
        if(isPrime[i] == false)
        {
            prime.push_back(i);
        }
    }
}

vector<vector<vector<int>>> dp(250,vector<vector<int>>(1300,vector<int>(20, 0)));

int f(int pos,int sum, int taken)
{
    if(pos == prime.size())
    {
        return (sum == 0 && taken == 0);
    }

    if(dp[pos][sum][taken] != -1) return dp[pos][sum][taken];
    int way1 = 0;
    int way2 = 0;

    if(prime[pos] <= sum && taken > 0)
    {
        way1 = f(pos+1,sum-prime[pos],taken-1);
    }   
    way2 = f(pos+1,sum,taken);

    return dp[pos][sum][taken] = way1 + way2;

}

void solve()
{

    for(int pos = 0; pos <= prime.size(); pos++)
    {
        for (int sum = 0; sum <= 1200; sum++)
        {
            for(int taken = 0; taken <= 16; taken++)
            {
                if(pos == prime.size())
                {
                    if(sum == 0 && taken == 0)
                    {
                        dp[pos][sum][taken] = 1;
                    }
                }
            }
        }
        
    }

    for(int pos = prime.size()-1; pos >= 0; pos--)
    {
        for(int sum = 0; sum <= 1200; sum++)
        {
            for(int taken = 0; taken <= 16; taken++)
            {
                
                int way1 = 0;
                int way2 = 0;

                if(prime[pos] <= sum && taken > 0)
                {
                    way1 = dp[pos+1][sum-prime[pos]][taken-1];
                }   
                way2 = dp[pos+1][sum][taken];

                dp[pos][sum][taken] = way1 + way2;
            }
        }
    }
}


int main()
{


    sieve(1200);

    // cout << prime.size() << endl;

    int n,k;
    solve();
    
    while(cin >> n >> k)
    {
        if(n == 0 && k == 0) break;

        // cout << f(0,n,k) << endl;
        cout << dp[0][n][k] << endl;


    }
}