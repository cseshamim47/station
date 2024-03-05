#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

void solve()
{}

pair<int,int> closest_sum(int arr[],int size,int k)
{
    pair<int,int> pr;
    pr = make_pair(INT_MAX, INT_MAX);
    int smGap = INT_MAX;
    int L = 0, R = size-1;
    while(L < R)
    {
        int sum = arr[L]+arr[R];
        int gap = abs(k-sum);
        if(gap < smGap)
        {
            pr.first = L;
            pr.second = R;
            smGap = gap;
        } 
        if(sum < k) L++;
        else R--;
    }
    return pr;
}

int main()
{
      //        Bismillah
    // w(t)
    int n , k;
    cin >> n >> k;
    int arr[n];
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
    }
    sort(arr,arr+n);
    auto pr = closest_sum(arr,n,k);    
    cout << arr[pr.first] << " + " << arr[pr.second] << " : " << arr[pr.first]+arr[pr.second] << endl;
}


// 1 2 3 4 5 
