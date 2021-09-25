#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006


void solve()
{
    int n;
    cin >> n;
    n++;
    int arr[n];
    int pf[n];
    pf[0] = 0;
    for(int i = 1; i < n; i++)
    {
        cin >> arr[i];
        pf[i] = pf[i-1] + arr[i];
    }

    int query;
    cin >> query;
    while(query--)
    {
        int l, r;
        cin >> l >> r;
        cout << pf[r] - pf[l-1] << endl;
    }
}

int32_t main()
{
      //        Bismillah
    w(t)
    
}


// 1 2 3 4 5
// 1 3 6 10 15
// 3 5 -> 15 - 3 = 12
// 4 5 -> 15 - 6 = 9

/*
    Given array a of N integers. Given Q queries and
    in each query given L and R print sum of array 
    elements from index L to R (L, R included)

    Contrains
    1 <= N <= 10^5
    1 <= a[i] <= 10^9
    1 <= Q <= 10^5
    1 <= L, R <= N
*/