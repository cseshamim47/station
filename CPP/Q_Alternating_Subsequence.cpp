#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

void solve()
{
    int n;
    cin >> n;
    int arr[n+1];
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
    }
    if(arr[n-1] < 0) arr[n] = 1;
    else arr[n] = -1;
    int nmax = INT_MIN, pmax = INT_MIN;
    int nf = 0, pf = 0;
    int last = 0;
    ll sum = 0;
    for(int i = 0; i <= n; i++)
    {
        if(arr[i] < 0)
        {
            nmax = max(nmax,arr[i]);
            if(i != 0 && arr[i-1] > 0)
            {
                sum += pmax;
                pmax = INT_MIN;
            }

        }
        else if(arr[i] > 0)
        {
            pmax = max(pmax,arr[i]);    
            if(i != 0 && arr[i-1] < 0)
            {
                sum += nmax;
                nmax = INT_MIN; 
            }
        } 
        // cout << pmax << " " << nmax << " " << sum << endl;
    }
    cout << sum << endl;
}

int main()
{
      //        Bismillah
    w(t)
    
}