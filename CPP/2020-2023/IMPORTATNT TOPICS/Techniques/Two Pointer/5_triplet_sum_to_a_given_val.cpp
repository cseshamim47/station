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
    int n,k;
    cin >> n >> k;
    int arr[n];
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
    }
    sort(arr,arr+n);
    int cnt = 0;
    for(int i = 0; i < n; i++)
    {
        int l = i+1;
        int r = n-1;
        while(l < r)
        {
            int sum =  arr[i]+arr[l]+arr[r];
            if(sum == k)
            {
                cout << arr[i] << "+" << arr[l] << "+" << arr[r] << " : " << sum << endl;
                cnt++;
            }
            if(sum > k) r--;
            else l++;
        }
    }
    if(!cnt) cout << "Triplet Not Found!!" << endl; 
}