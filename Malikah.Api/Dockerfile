FROM microsoft/dotnet:sdk AS build-env
WORKDIR /app
ENV ASPNETCORE_URLS=http://+:5003
EXPOSE 5003

# Copy csproj and restore as distinct layers
COPY *.csproj ./
RUN dotnet restore

# Copy everything else and build
COPY . ./
RUN dotnet publish -c Release -o out
# Build runtime image
FROM microsoft/dotnet:aspnetcore-runtime
WORKDIR /app
COPY --from=build-env /app/out .
ENTRYPOINT ["dotnet", "Malikah.Api.dll"]