#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define MAX 1000006
#define ll long long

ll kadanes(ll arr[], ll n)
{
    ll maxxFinal = INT_MIN;
    ll currMax = 0;
    for(int i = 0; i < n; i++)
    {
        currMax += arr[i];
        if(currMax > maxxFinal) maxxFinal = currMax;
        if(currMax < 0) currMax = 0;
    }
    return maxxFinal;
}

ll kCon(ll arr[], ll n, ll k)
{
    ll kadanes_max = kadanes(arr,n);
    if(k == 1) return kadanes_max;

    ll best_suffix = INT_MIN, best_prefix = INT_MIN;
    ll curr_suffix = 0, curr_prefix = 0;
    for(int i = 0; i < n; i++)
    {
        curr_prefix += arr[i];
        // if(curr_prefix > best_prefix) best_prefix = curr_prefix; 
        best_prefix = max(best_prefix,curr_prefix);
    }
    ll totalSum = curr_prefix;
    for(int i = n-1; i >= 0; i--)
    {
        curr_suffix += arr[i];
        // if(best_suffix < curr_suffix) best_suffix = curr_suffix;
        best_suffix = max(best_suffix,curr_suffix);
    }

    ll sum;
    if(totalSum < 0)
    {
        sum = max(kadanes_max,best_prefix+best_suffix);
    }
    else
    {
        sum = max(kadanes_max, best_prefix+(totalSum*(k-2))+best_suffix);
    }
    return sum;
}

void solve()
{
    ll n,k;
    cin >> n >> k;
    ll arr[n];
    for(int i = 0; i < n; i++) cin >> arr[i];

    cout << kCon(arr,n,k) << endl;
}

int main()
{
      //        Bismillah
    w(t)
    
}