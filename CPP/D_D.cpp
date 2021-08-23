#include <bits/stdc++.h>
using namespace std;
#define MAX 100005
#define ll long long

bool p[MAX];
vector<ll> primes,divisors[MAX];

void div(ll n)
{
    ll tmp = n;
    ll ans = 1;
    for(ll i = 0; i < primes.size() && primes[i]*primes[i] <= n; i++)
    {
        ll cnt = 0;
        if(n%primes[i] == 0)
        {
            while(n%primes[i] == 0)
            {
                cnt++;
                n/=primes[i];
            }
            ans *= (2*cnt+1);
        }
    }
    if(n > 1)
    {
        ans *= 3;
    }
    divisors[ans].push_back(tmp*tmp);
//    cout << tmp << " ";
}

void sieve()
{
    for(ll i = 3; i*i < MAX; i+=2)
    {
        if(!p[i])
        {
            for(ll j = i*i; j < MAX; j+=i)
            {
                p[j] = true;
            }
        }
    }

    primes.push_back(2);
    for(ll i = 3; i < MAX; i+=2)
    {
        if(!p[i]) primes.push_back(i);
    }
}

int main()
{
    sieve();
    for(ll i = 1; i < MAX; i++) div(i);

    int t; scanf("%d",&t);
    while(t--)
    {
        ll k,l,r;
        scanf("%lld %lld %lld",&k,&l,&r);
        ll ans = upper_bound(divisors[k].begin(),divisors[k].end(),r)-lower_bound(divisors[k].begin(),divisors[k].end(),l);
        printf("%lld\n",ans);
    }
}
