#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

void solve()
{}

pair<int,int> closest_sum(int arr[],int B[],int size,int k)
{
    pair<int,int> pr;
    pr = make_pair(INT_MAX, INT_MAX);
    int smGap = INT_MAX;
    int L = 0, R = size-1;
    while(L < size && R >= 0)
    {
        int sum = arr[L]+B[R];
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
    int B[n];
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
    }
    for(int i = 0; i < n; i++)
    {
        cin >> B[i];
    }
    sort(arr,arr+n);
    sort(B,B+n);
    auto pr = closest_sum(arr,B,n,k);    
    cout << arr[pr.first] << " + " << B[pr.second] << " : " << arr[pr.first]+B[pr.second] << endl;
}


// 1 2 3 4 5 
