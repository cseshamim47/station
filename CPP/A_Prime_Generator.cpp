#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 40000

bool primes[MAX];
vector<int> allPrimes;
void sieve()
{
    for(int i = 2; i*i < MAX; i++)
    {
        if(!primes[i])
        {
            for(int j = i*i; j < MAX; j+=i)
            {
                primes[j] = true;
            }
        }
    }
    allPrimes.push_back(2);
    for(int i = 3; i < MAX; i+=2)
    {
        if(primes[i] == false) allPrimes.push_back(i);
    }
}

void segSieve(ll l, ll r)
{
    int size = r - l + 1;
    bool isPrime[size];
    for(int i = 0; i < size; i++) isPrime[i] = true;

    for(int i = 0; allPrimes[i]*allPrimes[i] <= r; i++)
    {
        int CP = allPrimes[i];
        int start = ((l+CP-1)/CP)*CP; // 1*5 == 5
        for(ll j = start; j <= r; j+=CP)
        {
            // if(j-l >= 0)
            isPrime[j-l] = false;
            if(j-l<0)
            cout << "-- " << j-l << endl;  cout << j-l << endl;
        }
        if(CP == start)
        {
            isPrime[start-l] = true;
        }
    }

    if(l == 1) isPrime[0] = false;
    for(ll i = 0; i < (ll)size; i++)
    {
        if(isPrime[i]) cout << (i+l) << endl;
    }
    cout << endl;
}

void solve()
{
    ll l, r;
    cin >> l >> r;
    segSieve(l,r);
}

int main()
{
    sieve();
    // for(int i = 0; i < 30; i++)
    //     cout << allPrimes[i] << " ";
    w(t)
    
}