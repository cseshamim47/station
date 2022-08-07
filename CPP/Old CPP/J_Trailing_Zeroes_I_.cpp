#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

bool isPrime[MAX];
vector<ll> prime;
void sieve()
{
    for(ll i = 3; i < MAX; i+=2)
    {
        if(!isPrime[i])
        {
            for(ll j = i*i; j < MAX; j+=i+i)
                isPrime[j] = true;
        }
    }
    prime.push_back(2);
    for(ll i = 3; i < MAX; i+=2)
    {
        if(!isPrime[i]) prime.push_back(i);
    }

}

int Case;

int main()
{
    sieve();
    ll t;
    scanf("%lld", &t);
    while(t--)
    {
        ll k;
        scanf("%lld",&k);
        ll cnt = 0;
        ll d = 1;

        for(ll i = 0; i < (int)prime.size() && prime[i]*prime[i] <= k; i++)
        {
            cnt = 0;
            // cout << k << " " << prime[i] << endl;
            while(k % prime[i] == 0)
            {
                k/=prime[i];
                cnt++;
            }
            d *= (cnt+1);
        }

        if(k > 1)
        {
            d *= 2;
        } 
        printf("Case %d: %lld\n",++Case,d-1);
    }
    
}

// 264 -> 2 2 2 3 11