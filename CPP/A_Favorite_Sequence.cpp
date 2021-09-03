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
    for(int i = 0; i < n; i++) cin >> arr[i];
    int l = 0;
    int r = n-1;
    while(l <= r)
    {
        if(l == r)
        {
            cout << arr[l];
            l++;
        }
        else
        {
            cout << arr[l] << " " << arr[r] << " ";
            l++;
            r--;
        }
    }
    cout << endl;
}

int main()
{
      //        Bismillah
    w(t)
    
}