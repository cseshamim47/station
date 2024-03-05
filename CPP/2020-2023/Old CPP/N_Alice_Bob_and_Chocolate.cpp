#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

void solve()
{
    int n;
    cin >> n;
    int arr[n];
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
    }
    int alice = 0, bob = 0;
    int l = 0, r = n-1;
    int a = 0, b = 0;
    while(l < r)
    {
       if(arr[l] < arr[r]) 
       {
           arr[r] -= arr[l];
           arr[l] = 0;
           l++;
           a++;
           if(l == r) b++;
       }
       else if(arr[r] < arr[l])
       {
           arr[l] -= arr[r];
           arr[r] = -1;
           r--;
           b++;
           if(l == r) a++;
       }
       else
       {
           arr[l] = 0;
           arr[r] = -1;
           l++; r--;
           a++;b++;
       }
    }
    // for(auto x : arr) cout << x << " ";
    // if(n & 1 && a == b) a++;
    if(a+b != n) a++;
    cout << a << " " << b << endl;
}

int main()
{
    //        Bismillah
    // w(t)
    solve();
}

// 5
// 2 9 8 2 7
// 0 0 6 0 0

// 7
// 10 10 10 10 1 1 1 

// a a b b b b b 

// 0 0 3 0 0 0 0

// 2
// 1 10
// 0 9

// 6 
// 1 1 1 10 10 10
// 0 0 0 0 7 0 






