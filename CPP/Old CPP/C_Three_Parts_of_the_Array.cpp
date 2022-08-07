#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

void solve()
{}

int main()
{
      //        Bismillah
    // w(t)
    ll n;
    cin >> n;
    ll arr[n];

    for(ll i = 0; i < n; i++)
    {
        cin >> arr[i];
    }

    ll l = 0, r = n-1;
    ll a = arr[l];
    ll c = arr[r];
    ll sum = 0;
    while(l < r)
    {
        if(a == c && l != r) sum = a;
        if(a < c)
        {
            l++;
            a += arr[l];
        }
        else if(a > c)
        {
            r--;
            c += arr[r];
        }
        else
        {
            l++;
            a += arr[l];
        }
    }
    cout << sum << endl;
    
}