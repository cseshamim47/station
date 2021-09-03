#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 10000

bool isPrime[MAX];
vector<int> primes;
void sieve()
{
    for(int i = 3; i*i < MAX; i+=2)
    {
        if(!isPrime[i])
        {
            for(int j = i*i; j < MAX; j+=i)
            {
                isPrime[j] = true;
            }
        }
    }
    primes.push_back(2);
    for(int i = 3; i < MAX; i+=2)
    {
        if(!isPrime[i]) primes.push_back(i);
    }
}
vector<int> ans;
void preCal(int n)
{
    int cp = n;
    int cnt = 0;
    for(int i = 0; i <= cp; i++)
    {
        int k = 0;
        while(n % primes[i] == 0)
        {
            if(k == 0) cnt++;
            n/=primes[i];
            k++;
        }
        if(n==1) break;
    }
    if(cnt >= 3)
        ans.push_back(cp);
}

void solve()
{
    int n;
    cin >> n;
    cout << ans[n-1] << endl;
}

int main()
{
    sieve(); // 10000 * 100 = n*sqrt(n)
    for(int i = 1; i < 3000; i++) // n log n
    {
        preCal(i);
    }
    w(t)
    
}