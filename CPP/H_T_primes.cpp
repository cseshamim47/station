#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000010

bool isPrime[MAX];
vector<ll> p;
void sieve()
{
    for(ll i = 3; i*i <= MAX; i+=2)
    {
        if(isPrime[i] == false)
        {
            for(ll k = i*i; k <= MAX; k+=i)
            {
                isPrime[k] = true;
            }
        }
    }
    p.push_back(4);
    for(ll i = 3; i < MAX; i+=2) if(isPrime[i] == false) p.push_back(i*i);
}

void solve()
{
   ll n;
   cin >> n;
   ll arr[n];
   for(ll i = 0; i < n; i++) cin >> arr[i]; 
   
   for(ll i = 0; i < n; i++) 
   {
       auto it = binary_search(p.begin(),p.end(),arr[i]);
       if(it) cout << "YES" << "\n";
       else cout << "NO" << "\n";
   }
}

int main()
{
      //        Bismillah
    sieve();
    solve();
    // w(t)
    
}