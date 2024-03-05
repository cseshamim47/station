#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000

void solve()
{
    int n;
    cin >> n;
    int arr[n];
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
    }
    sort(arr,arr+n);
    int size = arr[n-1]+arr[n-2]+1;
    int ans[size]={0};

    for(int i = 2; i < size; i++)
    {
        int l = 0;
        int r = n-1;
        while(l < r)
        {
            int sum = arr[l]+arr[r];
            if(sum == i)
            {
                ans[i]++;
                l++;
                r--;
            }
            if(sum < i) l++;
            else if(sum > i) r--;
        }
        // cout << i << " " << ans[i] << endl;
        // getchar();
    }
    

    int maxx = *max_element(ans,ans+size);
    cout << maxx << "\n"; 
}

int main()
{
      //        Bismillah
    w(t)
    
}

// 1 2 3 4 5

// 1 -> 0
// 2 -> 0
// .
// .
// 5 -> (4,1)(3,2)
// 6 -> (5,1)(4,2)

