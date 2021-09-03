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
    int n;
    cin >> n;
    int arr[n];
    for(int i = 0; i < n; i++) cin >> arr[i];

    int l = 0;
    int r = n-1;
    int p1 = 0, p2 = 0;
    int i = 1;
    while(l <= r)
    {
        if(i & 1)
        {
            p1 += max(arr[l],arr[r]);
        }else 
        {
            p2 += max(arr[l],arr[r]);
        }
        if(arr[l] > arr[r]) l++;
        else r--;
        i++;
    }    
    cout << p1 << " " << p2 << endl;
}