#include <bits/stdc++.h>
using namespace std;

const int n = 3;
int arr[] = {1,2,3};

void t(int idx) // O(n! * n) -- SC : O(1)
{
    if(idx == n)
    {
        for(int i = 0; i < n; i++) cout << arr[i] << " ";
        cout << endl;
    }

    for(int i = idx; i < n; i++)
    {
        swap(arr[i],arr[idx]);
        t(idx+1);
        swap(arr[i],arr[idx]);
    }
}
int main()
{
    t(0);
}