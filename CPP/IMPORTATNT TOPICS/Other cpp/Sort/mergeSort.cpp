#include <bits/stdc++.h>
using namespace std;

const int N = 1e5+10;

int n;
vector<int> A;

void merge(int l, int r)
{
    int m = (l+r)/2;
    vector<int> v;
    int i = l, j = m+1;
    while(i <= m && j <= r)
    {
        if(A[i] <= A[j]) v.push_back(A[i++]);
        else v.push_back(A[j++]);
    }

    while(i <= m) v.push_back(A[i++]);
    while(j <= r) v.push_back(A[j++]);

    for(i = l,j = 0; i <= r; i++,j++) A[i] = v[j];
}

void mergeSort(int l, int r)
{
    if(l>=r) return;
    int m = (l+r)/2;
    mergeSort(l,m);
    mergeSort(m+1,r);
    merge(l,r);
}

int main()
{
    srand(time(NULL));
    scanf("%d", &n);
    A.resize(n);
    for(int i = 0; i < n; i++)
    {   
        A[i] = rand() % 10 + 1; 
    }

    for(int i : A) printf("%d ", i);
    printf("\n");

    mergeSort(0,n-1);

    for(int i : A) printf("%d ", i);
    printf("\n");
}